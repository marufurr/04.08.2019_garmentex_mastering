@extends('layouts.master')

@section('after_styles')
	<link href="{{ url('assets/modules/registration/style.css') }}" rel="stylesheet">
	<link href="{{ url('assets/modules/registration/responsive.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	   .w100{
	       width: 100% !important;
	   }
	   
	   .registration_page form{
	       width: 100% !important;
	   }
	   
	   .mt-10{
	       margin-top:10px;
	   }
	   
	   .site_color, .clr-red{
	       color: #dc3545 !important;
	   }
	   
	   .clr-green {
	       color : #087d11 !important;
	   }
	   
	   .text_decorate{
	       text-decoration: underline;
	       cursor:pointer;
	   }
	   
	   .dblock{
	       display:block !important; 
	   }
	   
	</style>
@endsection

@section('content')
	@if (!(isset($paddingTopExists) and $paddingTopExists))
		<div class="h-spacer"></div>
	@endif

 




<script type="text/html" id="tmp_check_activation">
     <div class="row stp_content">
        <div class="w100">
        <form name="checkActivationForm"  ng-submit="submitcheckActivationForm(checkActivationForm, 1)" novalidate>
         <div class="col-xl-8 offset-xl-2 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
          
         <div class="form-group" ng-if="verifyWith == 'email'">
            <label class="control-label font_bold">Email ID</label>
            <input maxlength="100" type="email" name="email" ng-model="verify.email" required="required" class="form-control" placeholder="Enter Your Email" />
            <div class="form-control-feedback" ng-if="(!checkActivationForm.email.$valid && checkActivationForm.email.$dirty && checkActivationForm.email.$viewValue.length > 0) || (checkActivationForm.$submitted && checkActivationForm.email.$invalid)">
				<span class="help-block clr-red">Enter a valid Email Address</span>
    		</div>
          </div>

          <div class="form-group" ng-if="verifyWith == 'phone'">
            <label class="control-label font_bold">Phone Number</label>
            <input maxlength="11" type="tel" id="phone" name="phone" class="form-control" ng-model="verify.phone" pattern="^\+?(88)?0?1[3456789][0-9]{8}\b" required="required" placeholder="Enter Your Phone Number">
            <div class="form-control-feedback" ng-if="(!checkActivationForm.phone.$valid && checkActivationForm.phone.$dirty && checkActivationForm.phone.$viewValue.length > 0 && checkActivationForm.$error.pattern) || (checkActivationForm.$submitted && checkActivationForm.phone.$invalid)">
				<span class="help-block clr-red site_color">Enter a valid Phone Number</span>
    		</div>
          </div>

          <div class="form-group">
            <label class="control-label font_bold"> Verification Code </label>
            <input maxlength="6" type="tel" id="phone" name="code" class="form-control" ng-model="verify.code" pattern="[0-9]{6}" required="required" placeholder="Enter Your OTP code">
            <div class="form-control-feedback" ng-if="(!checkActivationForm.code.$valid && checkActivationForm.code.$dirty && checkActivationForm.code.$viewValue.length > 0 && checkActivationForm.$error.pattern) || (checkActivationForm.$submitted && checkActivationForm.code.$invalid)">
				<span class="help-block clr-red site_color">Enter a valid OTP Code</span>
    		</div>
          </div>

            <div class="form-control-feedback mt-10" ng-if="notification.text">
				<span class="help-block @{{ notification.color}}" >@{{notification.text}}</span>
    		</div>
          <button class="btn btn-outline-danger nextBtn btn-lg text-center d-block w-100" type="submit"><span ng-if="notification.sending"><i class="fa fa-refresh fa-spin" style="font-size:24px"></i></span><span ng-if="!notification.sending">Next</span></button>
            <div class="form-control-feedback" ng-if="checkActivationForm.$submitted && checkActivationForm.$invalid">
				<span class="help-block clr-red" >Please correct provided informations</span>
    		</div>
            <label class="control-label mt-10" ng-if="verifyWith != 'phone'" ><span class="font_bold site_color text_decorate" ng-click="verifyWithType('phone')"> Verify with Phone Number</span></label>
            <label class="control-label mt-10" ng-if="verifyWith != 'email'"><span class="font_bold site_color text_decorate" ng-click="verifyWithType('email')"> Verify with Email Id</span></label>
            <label class="control-label mt-10 dblock" >Didn't receive the OTP ?   <span class="font_bold site_color text_decorate"> Resend SMS </span></label>

            <label class="control-label mt-10 dblock"><span class="font_bold site_color text_decorate" ng-click="goToNextPage(0)"> Register</span></label>
        </div>
       </form>
      </div>            
    </div>

</script>

<script type="text/html" id="tmp_register_step_1">
      <div class="row stp_content">
        <div ng-if="confirmBox" class="w100">
        <form name="step1ConfirmForm"  ng-submit="submitStep1ConfirmForm(step1ConfirmForm, 1)" novalidate>
         <div class="col-xl-8 offset-xl-2 col-lg-6 offset-lg-3 col-md-8 offset-md-2">

          <div class="form-group">
            <label class="control-label font_bold">  @{{ notifytMsgText() }} </label>
            <input maxlength="6" type="tel" id="phone" name="code" class="form-control" ng-model="verifycode.code" pattern="[0-9]{6}" required="required" placeholder="Enter Your OTP code">
            <div class="form-control-feedback" ng-if="(!step1ConfirmForm.code.$valid && step1ConfirmForm.code.$dirty && step1ConfirmForm.code.$viewValue.length > 0 && step1ConfirmForm.$error.pattern) || (step1ConfirmForm.$submitted && step1ConfirmForm.code.$invalid)">
				<span class="help-block clr-red site_color">Enter a valid OTP Code</span>
    		</div>
          </div>

            <div class="form-control-feedback mt-10" ng-if="notification.text">
				<span class="help-block @{{ notification.color}}" >@{{notification.text}}</span>
    		</div>
          <button class="btn btn-outline-danger nextBtn btn-lg text-center d-block w-100" type="submit"><span ng-if="notification.sending"><i class="fa fa-refresh fa-spin" style="font-size:24px"></i></span><span ng-if="!notification.sending">Next</span></button>
            <div class="form-control-feedback" ng-if="step1Form.$submitted && step1Form.$invalid">
				<span class="help-block clr-red" >Please correct provided informations</span>
    		</div>
                <label class="control-label mt-10" >Didn't receive the OTP ?   <span class="font_bold site_color text_decorate" ng-click="registerWithType('phone')"> Resend SMS </span></label>
        </div>
       </form>
        </div>            
        </div>
       
        <div ng-if="!confirmBox" class="w100">
        <form name="step1Form"  ng-submit="submitStep1Form(step1Form, 1)" novalidate>
        <div class="col-xl-8 offset-xl-2 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
          <div class="form-group" ng-if="registerWith == 'email'">
            <label class="control-label font_bold">Email ID</label>
            <input maxlength="100" type="email" name="email" ng-model="step1.email" required="required" class="form-control" placeholder="Enter Your Email" />
            <div class="form-control-feedback" ng-if="(!step1Form.email.$valid && step1Form.email.$dirty && step1Form.email.$viewValue.length > 0) || (step1Form.$submitted && step1Form.email.$invalid)">
				<span class="help-block clr-red">Enter a valid Email Address</span>
    		</div>
          </div>

          <div class="form-group" ng-if="registerWith == 'phone'">
            <label class="control-label font_bold">Phone Number</label>
            <input maxlength="11" type="tel" id="phone" name="phone" class="form-control" ng-model="step1.phone" pattern="^\+?(88)?0?1[3456789][0-9]{8}\b" required="required" placeholder="Enter Your Phone Number">
            <div class="form-control-feedback" ng-if="(!step1Form.phone.$valid && step1Form.phone.$dirty && step1Form.phone.$viewValue.length > 0 && step1Form.$error.pattern) || (step1Form.$submitted && step1Form.phone.$invalid)">
				<span class="help-block clr-red site_color">Enter a valid Phone Number</span>
    		</div>
          </div>

          <div class="form-group">
          <div class="custom-control custom-checkbox mb-4">
            <input type="checkbox" ng-model="step1.term" name="term" required="required" class="custom-control-input" id="customCheck1">
            <label class="custom-control-label" for="customCheck1">Upon creating my account, I agree to:<br>
                    - Garmentexbd.com User Agreement<br>
                    - Receive emails related to Garmentexbd.com membership and services.</label>
            <div class="form-control-feedback" ng-if="showTemrsError">
				<span class="help-block clr-red">Please accept term & conditions.</span>
    		</div>
            <div class="form-control-feedback" ng-if="(step2Form.term.$invalid && step2Form.term.$dirty) || (step1Form.$submitted && step1Form.term.$invalid)">
				<span class="help-block clr-red">Please accept terms & conditions.</span>
    		</div>

          </div>

            <div class="form-control-feedback mt-10" ng-if="notification.text">
				<span class="help-block @{{ notification.color}}" >@{{notification.text}}</span>
    		</div>
          <button class="btn btn-outline-danger nextBtn btn-lg text-center d-block w-100" type="submit"><span ng-if="notification.sending"><i class="fa fa-refresh fa-spin" style="font-size:24px"></i></span><span ng-if="!notification.sending">Next</span></button>
            <div class="form-control-feedback" ng-if="step1Form.$submitted && step1Form.$invalid">
				<span class="help-block clr-red" >Please correct provided informations</span>
    		</div>
            <label class="control-label mt-10" ng-if="registerWith != 'phone'" >Don't have any email address? Don't Worry  <span class="font_bold site_color text_decorate" ng-click="registerWithType('phone')"> Register with Phone Number instead</span></label>
            <label class="control-label mt-10" ng-if="registerWith != 'email'">Don't have any Phone Number ? Don't Worry  <span class="font_bold site_color text_decorate" ng-click="registerWithType('email')"> Register with Email Id instead</span></label>
            <label class="control-label mt-10 dblock"><span class="font_bold site_color text_decorate" ng-click="goToNextPage(10)"> I've an Activation Code</span></label>
        </div>
        </form>
        </div>
      </div>

</script>

<script type="text/html" id="tmp_register_step_2">
<div class="row stp_content">
    <form name="step2Form" ng-submit="submitStep2Form(step2, 2)" novalidate>
        <div class="col-xl-8 offset-xl-2">
          <div class="form-group">
            <label class="control-label font_bold">User Name</label>
            <input maxlength="100" name="username" ng-model="step2.username" type="text" class="form-control" placeholder="Username"/>
            <div class="form-control-feedback" ng-if="(!step2Form.username.$valid && step2Form.username.$dirty && step2Form.username.$viewValue.length > 0) || (step2Form.$submitted && step2Form.username.$invalid)">
				<span class="help-block clr-red">Enter a valid Username</span>
    		</div>
          </div>

          <div class="form-group">
            <label class="control-label font_bold">Email ID</label>
            <input maxlength="100" type="email" ng-readonly="old.email.length" name="email" ng-model="step2.email" class="form-control" placeholder="Enter Your Email" />
            <div class="form-control-feedback" ng-if="(!step2Form.email.$valid && step2Form.email.$dirty && step2Form.email.$viewValue.length > 0) || (step2Form.$submitted && step2Form.email.$invalid)">
				<span class="help-block clr-red">Enter a valid Email Address</span>
    		</div>
          </div>

          <div class="form-group">
            <label class="control-label font_bold">Phone Number</label>
            <input maxlength="11" type="tel" id="phone" ng-readonly="old.phone.length" name="phone" class="form-control" ng-model="step2.phone" pattern="^\+?(88)?0?1[3456789][0-9]{8}\b" placeholder="Enter Your Phone Number">
            <div class="form-control-feedback" ng-if="(!step2Form.phone.$valid && step2Form.phone.$dirty && step2Form.phone.$viewValue.length > 0 && step2Form.$error.pattern) || (step2Form.$submitted && step2Form.phone.$invalid)">
				<span class="help-block clr-red site_color">Enter a valid Phone Number</span>
    		</div>
          </div>


          <div class="form-group">
            <label class="control-label font_bold">Password</label>
            <input maxlength="100" type="password" ng-model="step2.password" name="password" required="required" class="form-control" placeholder="Enter Your Password"/>
            <div class="form-control-feedback" ng-if="(step2Form.password.$valid && step2Form.password.$dirty && step2Form.password_confirmation.$dirty && step2Form.password.$viewValue.length > 0 && step2Form.password.$viewValue != step2Form.password_confirmation.$viewValue) || (step2Form.$submitted && step2Form.password.$invalid)">
				<span class="help-block clr-red" ng-if="step2Form.password.$viewValue.length > 0">Password did not match</span>
                <span class="help-block clr-red" ng-if="step2Form.password.$viewValue.length <= 0">Please type a password</span>
    		</div>
          </div>
           
          <div class="form-group">
            <label class="control-label font_bold">Conform Password</label>
            <input maxlength="100" type="password" ng-model="step2.password_confirmation" name="password_confirmation" required="required" class="form-control" placeholder="Confirm Your Password" />
            <div class="form-control-feedback" ng-if="(step2Form.password_confirmation.$valid && step2Form.password.$dirty && step2Form.password_confirmation.$dirty && step2Form.password_confirmation.$viewValue.length > 0 && step2Form.password.$viewValue != step2Form.password_confirmation.$viewValue) || (step2Form.$submitted && step2Form.password_confirmation.$invalid)">
				<span class="help-block clr-red" ng-if="step2Form.password_confirmation.$viewValue.length > 0">Password did not match</span>
                <span class="help-block clr-red" ng-if="step2Form.password_confirmation.$viewValue.length <= 0">Please type a password</span>
    		</div>
               
          </div>
          <div class="form-group">
            <label class="control-label font_bold">Country</label>
            <select name="country_code" ng-model="step2.country_code" required="required" class="form-control">
              <option value="">Select Country</option>
              <option value="@{{country.code}}" ng-repeat="country in countries">@{{country.asciiname}}</option>
            </select>
            <div class="form-control feedback" ng-if="(step2Form.country_code.$invalid && step2Form.country_code.$dirty) || (step2Form.$submitted && step2Form.country_code.$invalid)">
				<span class="help-block clr-red">Please choose your country</span>
    		</div>
          </div>
          
          <div class="form-group">
            <label class="control-label font_bold d_block">Gender </label>
            <input type="radio" name="gender_id" ng-model="step2.gender_id" required="required" value="1">Male
            <input type="radio" name="gender_id" ng-model="step2.gender_id" required="required" value="2">Female
            <div class="form-control-feedback" ng-if="(step2Form.gender_id.$invalid && step2Form.gender_id.$dirty) || (step2Form.$submitted && step2Form.gender_id.$invalid)">
				<span class="help-block clr-red">Please choose account type</span>
    		</div>
          </div>

          <div class="form-group">
            <label class="control-label font_bold d_block">Account Type </label>
            <input type="radio" name="user_type_id" ng-model="step2.user_type_id" required="required" value="1">Supplier
            <input type="radio" name="user_type_id" ng-model="step2.user_type_id" required="required" value="2">Buyer
            <input type="radio" name="user_type_id" ng-model="step2.user_type_id" required="required" value="3">Both
            <div class="form-control-feedback" ng-if="(step2Form.user_type_id.$invalid && step2Form.user_type_id.$dirty) || (step2Form.$submitted && step2Form.user_type_id.$invalid)">
				<span class="help-block clr-red">Please choose account type</span>
    		</div>
          </div>

          <div class="form-group">
            <label class="control-label font_bold">Full Name</label>
            <input maxlength="100" type="text" name="name" ng-model="step2.name" required="required" class="form-control" placeholder="Enter Your Full Name" />
            <div class="form-control-feedback" ng-if="(step2Form.name.$invalid && step2Form.name.$dirty && step2Form.name.$viewValue.length > 0) || (step2Form.$submitted && step2Form.name.$invalid)">
				<span class="help-block clr-red" ng-if="step2Form.name.$viewValue.length > 100">Full name can't be more than 100 characters</span>
                <span class="help-block clr-red" ng-if="step2Form.name.$viewValue.length <= 0">Please type your Full Name</span>
    		</div>

          </div>
          <button class="btn btn-outline-danger nextBtn btn-lg text-center d-block w-100 mt-4" type="submit">Next</button>
            <div class="form-control-feedback" ng-if="(step2Form.$submitted && step2Form.$invalid) || (step2Form.$submitted && step2Form.password.$viewValue != step2Form.confirm_password.$viewValue)">
				<span class="help-block clr-red">Please correct provided informations</span>
    		</div>
        </div>
        </form>
      </div>
</script>

<script type="text/html" id="tmp_register_step_3">
      <div class="row stp_content" id="step-3">
        <div class="col-xl-8 offset-xl-2">
           <p class="text-center welcome">Hi, Mr. @{{ registerInfo.full_name }}.</p>
           <p class="text-center welcome">We're glad to see you there.</p>
          <button class="btn btn-outline-danger nextBtn btn-lg text-center d-block w-100 mt-4" ng-click="goToNextPage(3)" >Go Back</button>
        </div>
      </div>
</script>


<script type="text/html" id="tmp_question_home">
     <div class="quistions_page">
	  <div class="quistions_page_main_content text-center">
	    <div class="quistion_page_inner">
	      <div class="container">
	        <h1>Hi,  @{{ registerInfo.full_name }}, I'm Sam. Your personal assistant.</h1>
	        <p class="mt-4 font_s_18">Let's go through the easy process of creating a personalized experience together.</p>
	        <button class="btn btn-outline-danger btn-lg text-center mt-5 full_width_575 font_reg" type="button" ng-click="goToNextPage(4)">Next</button>
	      </div>
	    </div>
	  </div>
    </div>
</script>

<script type="text/html" id="tmp_question_1">
  <div class="quistions_page">
  <div class="quistions_page_main_content text-center">
    <div class="quistion_page_inner">
      <div class="container">
        <p class="font_s_18 text-center">Getting started!</p>
        <h1 class="mt-3 text-center">How would you describe your business? *</h1>
        <div class="quistions_item_area">
          <div class="row">
            <div class="col-xl-4 co-lg-4 col-md-6 col-sm-6 col-xs-12" ng-click="selectAnswer($index)" ng-repeat="answer in qsn1">
              <a href="javascript:void(0)" class="quistion_item border rounded p-4 w-100 d-block text-left font_s_18 @{{ answer.selected == true ? 'selectedAnswer' : '' }}">
                @{{ answer.answer }}
              </a>
            </div>
           
          </div>
        </div>
        <button class="btn btn-outline-danger btn-lg text-center mt-5 full_width_575 font_reg" type="button" ng-click="goToNextPage(5)">Next</button>
      </div>
    </div>
  </div>
</div>  

</script>

<script type="text/html" id="tmp_question_2">

<div class="quistions_page">
  <div class="quistions_page_main_content text-center w-100">
    <div class="quistion_page_inner">
      <div class="container">
        <p class="font_s_18 text-center">Great.</p>
        <h1 class="mt-3 text-center">What are your preferred industries for sourcing (max.)? </h1>
        <div class="quistions_item_area">
          <div class="row">
            

            <div class="col-xl-4 co-lg-4 col-md-6 col-sm-6 col-xs-12" ng-click="selectAnswer($index)" ng-repeat="answer in qsn2">
              <a href="javascript:void(0)" class="quistion_item border rounded p-4 w-100 d-block text-left font_s_18 @{{ answer.selected == true ? 'selectedAnswer' : '' }}">
                @{{ answer.answer }}
              </a>
            </div>


    

          </div>
        </div>
        <button class="btn btn-outline-danger btn-lg text-center mt-5 full_width_575 font_reg" type="button" ng-click="goToNextPage(6)">Next</button>
      </div>
    </div>
  </div>
</div>  

</script>

<script type="text/html" id="tmp_question_3">
<div class="quistions_page">
  <div class="quistions_page_main_content text-center w-100">
    <div class="quistion_page_inner">
      <div class="container">
        <p class="font_s_18 text-center">Let's dive in a bit deeper.....</p>
        <h1 class="mt-3 text-center">Whice categories are relevant to you? *</h1>
        <div class="quistions_item_area categories_select">
          <div class="row">
            
            <div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-sm-10 offset-sm-1 col-xs-12 offset-xs-0" ng-click="selectAnswer($index)" ng-repeat="answer in parentCategories">
              <a href="javascript:void(0)" class="quistion_item border rounded p-3 w-100 d-block text-left font_s_18 @{{ answer.selected == true ? 'selectedAnswer' : '' }}">
                @{{ answer.name }}
              </a>
            </div>


          
          </div>
        </div>
        <button class="btn btn-outline-danger btn-lg text-center mt-5 full_width_575 font_reg" type="button" ng-click="goToNextPage(7)">Next</button>
      </div>
    </div>
  </div>
</div>  
</script>

<script type="text/html" id="tmp_question_4">
<div class="quistions_page">
<div class="quistions_page_main_content text-center w-100">
  <div class="quistion_page_inner">
    <div class="container">
      <p class="font_s_18">Thanks @{{ registerInfo.full_name }}!</p>
      <h1 class="mt-3">I have a few more bonus questions which will help give you more specific recommendation.</h1>
      <p class="mt-4 font_s_18">Let's go through the easy process of creating a personalized experience together.</p>
      <button class="btn btn-outline-danger btn-lg text-center mt-5 full_width_575 font_reg" type="button" ng-click="goToNextPage(8)">Next</button>
      <!-- <a href="javascript:void(0)" class="d-block mt-3 link">No thanks, I'm good for now</a> -->
    </div>
  </div>
</div>
</div>  
	
</script>

<script type="text/html" id="tmp_question_5">
<div class="quistions_page">
  <div class="quistions_page_main_content text-center w-100">
    <div class="quistion_page_inner">
      <div class="container">
        <p class="font_s_18 text-center">You are on a roll today!</p>
        <h1 class="mt-3 text-center">Bonus: What do you look for a supplier?</h1>
        <div class="quistions_item_area">
          <div class="row">
            
           <div class="col-xl-4 co-lg-4 col-md-6 col-sm-6 col-xs-12" ng-click="selectAnswer($index)" ng-repeat="answer in qsn5">
              <a href="javascript:void(0)" class="quistion_item border rounded p-4 w-100 d-block text-left font_s_18 @{{ answer.selected == true ? 'selectedAnswer' : '' }}">
                @{{ answer.answer }}
              </a>
            </div>
   
          </div>
        </div>
        <button class="btn btn-outline-danger btn-lg text-center mt-5 full_width_575 font_reg" type="button" ng-click="goToNextPage(9)">Next</button>
      </div>
    </div>
  </div>
</div> 
</script>

<script type="text/html" id="tmp_register_confirm">
     <div class="quistions_page register_confirm">
	  <div class="quistions_page_main_content text-center">
	    <div class="quistion_page_inner">
	      <div class="container">
	        <h3 ng-if="notification" class="notification">@{{notification}}</h3>
               <div ng-if="error">
                <div class="alert bg-danger alert-styled-left" ng-repeat="error in errorMsgs" >
			         <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
			        <span ng-repeat="msgs in error ">@{{ msgs }}</span>
	           </div>
              </div>
<button class="btn btn-outline-danger btn-lg text-center mt-5 full_width_575 font_reg" type="button" ng-click="registerConfirm()">Register</button>
	        <!-- <a href="@{{ appUrl }}" class="btn btn-outline-danger btn-lg text-center mt-5 full_width_575 font_reg">Home</a> -->
	      </div>
	    </div>
	  </div>
    </div>
</script>




	<div class="main-container">
		<div class="container">
			<div class="row" ng-app="registrationApp">
                <div class="registration_page w100" ng-controller="RegisterController">
                  <div class="container">
                    <div class="stepwizard col-md-offset-3" ng-show="stepWizard">
                      <div class="stepwizard-row setup-panel">
                        <div class="stepwizard_step">
                          <a href="javascript:void(0)" type="button" class="@{{ activeClass == 1 ? 'btn_active' : '' }} btn_circle rounded-circle">1</a>
                          <p class="font_bold">Verification</p>
                        </div>
                        <div class="stepwizard_step">
                          <a href="javascript:void(0)" type="button" class="@{{ activeClass == 2 ? 'btn_active' : '' }} btn_circle rounded-circle">2</a>
                          <p class="font_bold">Information</p>
                        </div>
                        <div class="stepwizard_step">
                          <a href="javascript:void(0)" type="button" class="@{{ activeClass == 3 ? 'btn_active' : '' }} btn_circle rounded-circle">3</a>
                          <p class="font_bold">Complete</p>
                        </div>
                      </div>
                    </div>
                     <div id="tmpContent"></div> 
                  </div>
                </div>    
			</div>
		</div>
	</div>
@endsection

@section('after_scripts')
	<script>
    <?php 
        $appUrl =lurl('/');
		$multiCountries = array();
        if (\App\Models\Country::where('active', 1)->count() >= 1) {
	         $multiCountries = \App\Models\Country::where('active', 1)->get();
	    }
	?>

	var parentCategories = '<?php echo json_encode($categories)?>';
	
	var token = '<?php echo getSegment(5);?>';
	var verify_message = '<?php echo $verify_message;?>';
	var user = '<?php echo $user !== null ? $user->toJson() : 0;?>';
	var appUrl = '<?php echo $appUrl; ?>';
	var multiCountries = '<?php echo json_encode($multiCountries)?>';
	multiCountries = JSON.parse(multiCountries);
	parentCategories = JSON.parse(parentCategories);

	</script>
<script src="{{ url('assets/modules/registration/registration.js') }}"></script>
	
@endsection