<?php
/**
 * LaraClassified - Classified Ads Web Application
 * Copyright (c) BedigitCom. All Rights Reserved
 *
 * Website: http://www.bedigit.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from Codecanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
 */

namespace App\Http\Controllers\Auth;

use App\Helpers\Ip;
use App\Helpers\Localization\Country as CountryLocalization;
use App\Helpers\Localization\Helpers\Country as CountryLocalizationHelper;
use App\Http\Controllers\Auth\Traits\VerificationTrait;
use App\Http\Controllers\FrontController;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Response;
use App\Models\Gender;
use App\Models\Permission;
use App\Models\User;
use App\Models\UserType;
use App\Notifications\UserActivated;
use App\Notifications\UserNotification;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Torann\LaravelMetaTags\Facades\MetaTag;
use SoapClient;
use App\Models\Scopes\VerifiedScope;
use App\Models\Category;
use App\Models\Scopes\ActiveScope;

class RegisterController extends FrontController
{
	use RegistersUsers, VerificationTrait;
	
	/**
	 * Where to redirect users after login / registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/account';
	
	/**
	 * @var array
	 */
	public $msg = [];
	
	/**
	 * RegisterController constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		
		// From Laravel 5.3.4 or above
		$this->middleware(function ($request, $next) {
			$this->commonQueries();
			
			return $next($request);
		});
	}
	
	/**
	 * Common Queries
	 */
	public function commonQueries()
	{
		$this->redirectTo = config('app.locale') . '/account';
	}
	
	/**
	 * Show the form the create a new user account.
	 *
	 * @return View
	 */
	public function showRegistrationForm()
	{
		$data = [];
		$token = getSegment(5);
		$user = null;
		$data['verify_message'] = "";
		if(null !== $token && isset($token) && !empty($token)){
		    $user  = User::withoutGlobalScope(VerifiedScope::class)->where('email_token', $token)->first();
		    if(null != $user && isset($user)){
		        if($user->verified_email == 1){
		            $data['verify_message'] = "Your email address is already verified!";
		        }else{
    		        $user->verified_email = 1;
    		        $user->save();
    		        $data['verify_message'] = "Congratulation! Your email address has been successfully verified!";
		        }
		        $user = $user->where('email_token', $token)->first(['id','email', 'verified_email', 'created_at']);
		    }
		}
		
		$data['user'] = $user;
		// References
		$data['categories'] = Category::withoutGlobalScope(ActiveScope::class)->where('parent_id', 0)->where('active', 1)->get();
		$data['countries'] = CountryLocalizationHelper::transAll(CountryLocalization::getCountries());
		$data['genders'] = Gender::trans()->get();
		
		// Meta Tags
		MetaTag::set('title', getMetaTag('title', 'register'));
		MetaTag::set('description', strip_tags(getMetaTag('description', 'register')));
		MetaTag::set('keywords', getMetaTag('keywords', 'register'));
		
		return view('auth.register.index', $data);
	}
	
	public function sendVerificationCode(Request $request){
	    
        $input = $request->all();
        if(Arr::has($input, 'data.key')){
            return Arr::get($input, 'data.key') == 'email' ? $this->sendEmailConfirmation(Arr::get($input, 'data.value')) : $this->sendPhoneConfirmation(Arr::get($input, 'data.value'));
        }
	}
	
	public function jsonResponse($errorCode, $error, $errorMsg, $color = "", $responseData = array(), $statusCode = 200  ){
	    return response()->json(array(
	        'responseCode' => $errorCode,
	        'error' => $error,
	        'text' => $errorMsg,
	        'color' => $color,
	        'responseData' => $responseData
	    ), $statusCode);
	    
	}
	
	public function sendPhoneConfirmation($phone){
	    //return $this->jsonResponse(101, true, $phone,'clr-red');
	    $validator = Validator::make(array('phone'=>$phone), ['phone' => 'required|phone:BD,phone|unique:users']);
	    if($validator->fails()){
	        return $this->jsonResponse(101, true, $validator->getMessageBag()->first('phone'),'clr-red');
	    }
	    
	    // New User
	    $user = new User();
	    $user->phone = $phone;
	    $user->country_code   = config('country.code');
	    $user->language_code  = config('app.locale');
	    $user->ip_addr        = Ip::get();
	    $user->verified_email = 1;
	    
	    // Email verification key generation
	    $user->phone_token = mt_rand(100000, 999999);
	    $user->verified_phone = 0;
	    $user->save();
	    
	    $data = array();
	    $data['response'] = 'value';
	    $data['otp'] = $user->phone_token;
	    $data['msg'] = 'Sms Sent Successfully';
	    $data['success'] = true;
	    
	    /**
	    try{
	        $soapClient = new SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
	        $paramArray = array(
	            'userName' => "01723373375",
	            'userPassword' => "58228",
	            'mobileNumber' => $phone,
	            'smsText' => "Welcome to garmentexbd.com your OTP is $user->phone_token",
	            'type' => "TEXT",
	            'maskName' => '',
	            'campaignName' => '',
	        );
	        $value = $soapClient->__call("OneToOne", array($paramArray));
	       
	        $data['response'] = $value->OneToOneResult;
	        $data['otp'] = $user->phone_token;
	        $data['msg'] = 'Sms Sent Successfully';
	        $data['success'] = true;
	        
	    } catch (\Exception $e) {
	        $data['msg'] = $e->getMessage();
	        $data['success'] = false;
	        return $this->jsonResponse(202, true, $e->getMessage(), 'clr-red', array());
	    }
	    **/
	    return $this->jsonResponse(200, false, $data['msg'], 'clr-red', $data);
	   
	}
	
	public function verifyEntityToken(Request $request){
	    $input =  $request->all();
	    if(Arr::has($input, 'data.entity') && Arr::has($input, 'data.value')  &&  Arr::has($input, 'data.token')){
	        $entity = Arr::get($input, 'data.entity');
	        $value = Arr::get($input, 'data.value');
	        $token = Arr::get($input, 'data.token');
	        $user  = User::withoutGlobalScope(VerifiedScope::class)->where("{$entity}_token", $token)->where($entity, $value)->first();
	        $data = array();
	        $verify_field = "verified_{$entity}";
	        if(null != $user && isset($user)){
	            if($user->$verify_field == 1){
	                $data['responseCode'] = 212;
	                $data['error'] = true;
	                $data['color'] = 'clr-red';
	                $data['text'] = "Your $entity is already verified!";
	            }else{
	                $user->$verify_field = 1;
	                $user->save();
	                $data['error'] = false;
	                $data['color'] = 'clr-green';
	                $data['responseCode'] = 210;
	                $data['text'] = "Congratulation! Your $entity has been successfully verified!";
	            }
	            return $this->jsonResponse($data['responseCode'], $data['error'], $data['text'], $data['color'], array('userid' => $user->id));
	        }else{
	            return $this->jsonResponse(200, true, 'Invalid OTP', 'clr-red', array('userid' => null));
	        }
	    }
	    return $this->jsonResponse(200, true, 'Something went wrong', 'clr-red', array('userid' => null));
	}
	/*
	'responseCode' => $errorCode,
	'error' => $error,
	'text' => $errorMsg,
	'color' => $color,
	'responseData' => $responseData*/
	
	public function sendEmailConfirmation($email){
	    $validator = Validator::make(array('email'=>$email), ['email' => 'required|email|unique:users,email']);
	    if($validator->fails()){
	        return $this->jsonResponse(101, true, 'Email address already exists.');
	    }

	    // New User
	    $user = new User();
	    $user->email = $email;
	    $user->country_code   = config('country.code');
	    $user->language_code  = config('app.locale');
	    $user->ip_addr        = Ip::get();
	    $user->verified_phone = 1;
	    
	    // Email verification key generation
	    $user->email_token = mt_rand(100000, 999999);
        $user->verified_email = 0;
        $user->save();
         
        
        $data = array();
         // Email
         if($this->sendVerificationEmail($user)){
             $data['success'] = true;
             return $this->jsonResponse(110, false, "A confirmation code is sent your email address.", 'clr-green', $data);
         }
         $data['success'] = false;
         return $this->jsonResponse(111, true, "Email couldn't be sent. Some error occured. Please try again.", 'clr-red', $data);
	    
	}
	
	
	public function checkActivationCode(Request $request){
	    $input =  $request->all();
	    if(Arr::has($input, 'data.entity') && Arr::has($input, 'data.value')  &&  Arr::has($input, 'data.token')){
	        $entity = Arr::get($input, 'data.entity');
	        $value = Arr::get($input, 'data.value');
	        $token = Arr::get($input, 'data.token');
	        $user  = User::withoutGlobalScope(VerifiedScope::class)->where("{$entity}_token", $token)->where($entity, $value)->first();
	        $data = array();
	        $verify_field = "verified_{$entity}";
	        if(null != $user && isset($user)){
	            if($user->$verify_field == 1){
	                $data['responseCode'] = 212;
	                $data['error'] = true;
	                $data['color'] = 'clr-red';
	                $data['text'] = "Your $entity is already verified!";
	            }else{
	                $user->$verify_field = 1;
	                $user->save();
	                $data['error'] = false;
	                $data['color'] = 'clr-green';
	                $data['responseCode'] = 210;
	                $data['text'] = "Congratulation! Your $entity has been successfully verified!";
	            }
	            return $this->jsonResponse($data['responseCode'], $data['error'], $data['text'], $data['color'], array('userid' => $user->id));
	        }else{
	            return $this->jsonResponse(200, true, 'Invalid OTP', 'clr-red', array('userid' => null));
	        }
	    }
	    return $this->jsonResponse(200, true, 'Something went wrong', 'clr-red', array('userid' => null));
	}
	
	/**
	 * Register a new user account.
	 *
	 * @param RegisterRequest $request
	 * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */

	public function register(RegisterRequest $request)
	{
		
    
	    $input = Arr::get($request->all(), 'data.registerInfo');
		$user = User::find($input['userid']);
		$questions = Arr::get($request->all(), 'data.qsns');
		$input = Arr::only($input, $user->getFillable());
		foreach ($input as $key => $value) {
			$user->{$key} = $value;
		}
		
		$user->country_code   = config('country.code');
		$user->language_code  = config('app.locale');
		$user->password       = Hash::make($request->input('password'));
		$user->phone_hidden   = $request->input('phone_hidden');
		$user->ip_addr        = Ip::get();
		$user->verified_email = 1;
		$user->verified_phone = 1;
		$user->questions = json_encode($questions);
		// Save
		
		
		/**
		if (config('settings.mail.confirmation') == 1) {
		    try {
		        $user->notify(new UserActivated($user));
		    } catch (\Exception $e) {
		        flash($e->getMessage())->error();
		    }
		}**/
		
		try {
		    $user->save();
		    $user->notify(new UserActivated($user));
		} catch (\Exception $e) {
		    flash($e->getMessage())->error();
		}
		
		if($user->save()){
		    
		}
		
		if($user->save() && Auth::loginUsingId($user->id)){
	          return $this->jsonResponse(130, false, "User Account Created.", 'clr-green', array());
		}
		/**
		// Redirect to the user area If Email or Phone verification is not required
		if (Auth::loginUsingId($user->id)) {
		    return $this->jsonResponse(130, false, "User Account Created.", 'clr-green', array());
		    //return redirect()->intended(config('app.locale') . '/account');
		    
		}**/
		return $this->jsonResponse(111, true, "User couldn't be created. Some error occured. Please try again.", 'clr-red', array());
		
		// Message Notification & Redirection
		/**
		$request->session()->flash('message', t("Your account has been created."));
		$nextUrl = config('app.locale') . '/register/finish';
		
		// Send Admin Notification Email
		if (config('settings.mail.admin_notification') == 1) {
			try {
				// Get all admin users
				$admins = User::permission(Permission::getStaffPermissions())->get();
				if ($admins->count() > 0) {
					Notification::send($admins, new UserNotification($user));
					/*
                    foreach ($admins as $admin) {
						Notification::route('mail', $admin->email)->notify(new UserNotification($user));
                    }
					
				}
			} catch (\Exception $e) {
				flash($e->getMessage())->error();
			}
		}*/
		/**
		// Send Verification Link or Code
		if ($emailVerificationRequired || $phoneVerificationRequired) {
			
			// Save the Next URL before verification
			session(['userNextUrl' => $nextUrl]);
			
			// Email
			if ($emailVerificationRequired) {
				// Send Verification Link by Email
				$this->sendVerificationEmail($user);
				
				// Show the Re-send link
				$this->showReSendVerificationEmailLink($user, 'user');
			}
			
			// Phone
			if ($phoneVerificationRequired) {
				// Send Verification Code by SMS
				$this->sendVerificationSms($user);
				
				// Show the Re-send link
				$this->showReSendVerificationSmsLink($user, 'user');
				
				// Go to Phone Number verification
				$nextUrl = config('app.locale') . '/verify/user/phone/';
			}
			
			// Send Confirmation Email or SMS,
			// When User clicks on the Verification Link or enters the Verification Code.
			// Done in the "app/Observers/UserObserver.php" file.
			
		} else {
			
			// Send Confirmation Email or SMS
			if (config('settings.mail.confirmation') == 1) {
				try {
					$user->notify(new UserActivated($user));
				} catch (\Exception $e) {
					flash($e->getMessage())->error();
				}
			}
			
			// Redirect to the user area If Email or Phone verification is not required
			if (Auth::loginUsingId($user->id)) {
				return redirect()->intended(config('app.locale') . '/account');
			}
			
		}
		
		// Redirection
		return redirect($nextUrl);
		**/
	}
	
	
	/**
	public function register(RegisterRequest $request)
	{
	    // Conditions to Verify User's Email or Phone
	    $emailVerificationRequired = config('settings.mail.email_verification') == 1 && $request->filled('email');
	    $phoneVerificationRequired = config('settings.sms.phone_verification') == 1 && $request->filled('phone');
	    
	    // New User
	    $user = new User();
	    $input = $request->only($user->getFillable());
	    foreach ($input as $key => $value) {
	        $user->{$key} = $value;
	    }
	    
	    $user->country_code   = config('country.code');
	    $user->language_code  = config('app.locale');
	    $user->password       = Hash::make($request->input('password'));
	    $user->phone_hidden   = $request->input('phone_hidden');
	    $user->ip_addr        = Ip::get();
	    $user->verified_email = 1;
	    $user->verified_phone = 1;
	    
	    // Email verification key generation
	    if ($emailVerificationRequired) {
	        $user->email_token = md5(microtime() . mt_rand());
	        $user->verified_email = 0;
	    }
	    
	    // Mobile activation key generation
	    if ($phoneVerificationRequired) {
	        $user->phone_token = mt_rand(100000, 999999);
	        $user->verified_phone = 0;
	    }
	    
	    // Save
	    $user->save();
	    
	    // Message Notification & Redirection
	    $request->session()->flash('message', t("Your account has been created."));
	    $nextUrl = config('app.locale') . '/register/finish';
	    
	    // Send Admin Notification Email
	    if (config('settings.mail.admin_notification') == 1) {
	        try {
	            // Get all admin users
	            $admins = User::permission(Permission::getStaffPermissions())->get();
	            if ($admins->count() > 0) {
	                Notification::send($admins, new UserNotification($user));
	                
	                // foreach ($admins as $admin) {
	               //  Notification::route('mail', $admin->email)->notify(new UserNotification($user));
	               //  }
	                 
	            }
	        } catch (\Exception $e) {
	            flash($e->getMessage())->error();
	        }
	    }
	    
	    // Send Verification Link or Code
	    if ($emailVerificationRequired || $phoneVerificationRequired) {
	        
	        // Save the Next URL before verification
	        session(['userNextUrl' => $nextUrl]);
	        
	        // Email
	        if ($emailVerificationRequired) {
	            // Send Verification Link by Email
	            $this->sendVerificationEmail($user);
	            
	            // Show the Re-send link
	            $this->showReSendVerificationEmailLink($user, 'user');
	        }
	        
	        // Phone
	        if ($phoneVerificationRequired) {
	            // Send Verification Code by SMS
	            $this->sendVerificationSms($user);
	            
	            // Show the Re-send link
	            $this->showReSendVerificationSmsLink($user, 'user');
	            
	            // Go to Phone Number verification
	            $nextUrl = config('app.locale') . '/verify/user/phone/';
	        }
	        
	        // Send Confirmation Email or SMS,
	        // When User clicks on the Verification Link or enters the Verification Code.
	        // Done in the "app/Observers/UserObserver.php" file.
	        
	    } else {
	        
	        // Send Confirmation Email or SMS
	        if (config('settings.mail.confirmation') == 1) {
	            try {
	                $user->notify(new UserActivated($user));
	            } catch (\Exception $e) {
	                flash($e->getMessage())->error();
	            }
	        }
	        
	        // Redirect to the user area If Email or Phone verification is not required
	        if (Auth::loginUsingId($user->id)) {
	            return redirect()->intended(config('app.locale') . '/account');
	        }
	        
	    }
	    
	    // Redirection
	    return redirect($nextUrl);
	}**/
	
	/**
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|View
	 */
	public function finish()
	{
		// Keep Success Message for the page refreshing
		session()->keep(['message']);
		if (!session()->has('message')) {
			return redirect(config('app.locale') . '/');
		}
		
		// Meta Tags
		MetaTag::set('title', session('message'));
		MetaTag::set('description', session('message'));
		
		return view('auth.register.finish');
	}
}
