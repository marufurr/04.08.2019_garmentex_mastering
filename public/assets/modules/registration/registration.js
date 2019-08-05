		/*
 * Ami Nirob
 * 01-02-2018
 */

//ids : token

var app = angular.module('registrationApp', []);
 
app.factory('helpers', ['$compile', '$window', '$filter', '$http', '$timeout','$q',  function( $compile, $window, $filter, $http, $timeout, $q){
	var helpers = {

		dirs : [
			'<regstep1></regstep1>', // 0
			'<regstep2></regstep2>', //1
			'<regstep3></regstep3>', // 2
			'<questionhome></questionhome>', // 3
			'<question1></question1>', //4
			'<question2></question2>', //5 
			'<question3></question3>', //6
			'<question4></question4>', //7
			'<question5></question5>', //8
			'<registerconfirm></registerconfirm>', //**
			'<checkactivation></checkactivation>' //10
			],
		changeDirs : function(i, $scope){
				var dirctive = $compile(this.dirs[i])($scope);
				var tmpContent = $('#tmpContent');
				tmpContent.html(dirctive);
			},
		collection : {
			registerInfo :{
				userid : "",
				email:"",
				phone:"",
				username : "",
				password : "",
				password_confirmation : "",
				country_code : "",
				gender_id : "",
				user_type_id : "",
				name : "",
				term: ""
			},
			qsns:{
				qsn1 : false,
				qsn2 : false,
				qsn3 : false,
				qsn5 : false,
			}
		},
		localData : {
			countries : multiCountries,
		},
		getDuration:function(carintime){
			var ms = moment(new Date(),"YYYY-MM-DD HH:mm:ss").diff(moment(carintime,"YYYY-MM-DD HH:mm:ss"));
	    	var d = moment.duration(ms);
	    	var s = Math.floor(d.asHours()) + moment.utc(ms).format(":mm:ss");
	    	return {
	    		hours : Math.floor(d.asHours()),
	    		minutes : moment.utc(ms).format("mm")
	    	};
		},
		allstats : {},
		currentDir : 0,
		auth : {},
		cleanStorage : function(){},
		promise : function (dataToSend, notifyMsg, url){
			var deferred = $q.defer();
			$timeout(function() {
				deferred.notify(notifyMsg);
			}, 0);
			//when returning from php, response must contain res.status && res.errorText
			//$http.defaults.headers.post["Content-Type"] = 'application/x-www-form-urlencoded; charset=UTF-8;';
			var data = JSON.stringify({data : dataToSend});
			$http({
				  method: 'POST',
				  url: url,
				  data: data
				}).then(function successCallback(response) {
					if(response.statusText == "OK" && response.status == 200){
						deferred.resolve(response);
					}else{
						deferred.reject(response);
					}
				}, function errorCallback(response) {
					deferred.reject(response);
				});
            return deferred.promise;
		}, 
		localStore : {},
		generateToken :  function(len) {
				var chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
				var string_length = len;
				var randomstring = '';
				for (var i=0; i<string_length; i++) {
					var rnum = Math.floor(Math.random() * chars.length);
					randomstring += chars.substring(rnum,rnum+1);
				}
				return randomstring;
			}	
		}
	return helpers;
}]);


// tmp_frontdashboard
app.directive('regstep1', ['helpers', '$window', '$rootScope', '$q', '$timeout', function( helpers, $window, $rootScope, $q, $timeout){
	return {
		template: function(){
			return $('#tmp_register_step_1').html();
		},
		link: function($scope, $element, $attrs){
			$scope.registerWith = 'email';
			
			$scope.verify_message = verify_message;
			$scope.user = user;
			$scope.token = token;
			$scope.confirmBox = token.length > 0 ? true : false ;
			
			$scope.step1 = {
				email: "",
				phone : "",
				term: false
			};
			
			$scope.verifycode = {code : ""};
			
			$scope.notification = {
					sending : false,
					text : "",
					color : ""
			}
			
			
			$scope.registerWithType = function(type){
				$scope.registerWith = type;
			}
			
			$scope.$watchCollection('step1', function(newVal, oldVal){
				angular.forEach($scope.step1, function(item, key){
					helpers.collection.registerInfo[key] = newVal[key];
				});
			});
			
			/**
				Status codes
				101 = Duplicate Email
			**/
			
			$scope.submitStep1Form = function(step1Form, dest){
				if(step1Form.$valid ){
					helpers.promise({key:$scope.registerWith, value:$scope.step1[$scope.registerWith]}, 'Please wait ... ', appUrl+'/verify/user/sendVerificationCode').then(
						function(response){
							var response = jQuery.parseJSON(JSON.stringify(response.data));
							console.log(response);
							$scope.notification.text = response.text;
							$scope.notification.color = response.color;
							$scope.notification.sending = false;
							if(!response.error && response.responseData.success ){
								$scope.confirmBox = true;
							}
							
						},
						function(errMsg){
							console.log(errMsg);
							$scope.notification.text = errMsg.data.text;
							$scope.notification.sending = false;
						},
						function(notify){
							$scope.notification.text = notify;
							$scope.notification.sending = true;
						}
					);	
				}
			}
			
			$scope.phoneConfirm = false;
			
			$scope.submitStep1ConfirmForm = function(step1ConfirmForm, dest){
				if(step1ConfirmForm.$valid){
					if($scope.phoneConfirm == true){
						$rootScope.goToNextPage(dest);
					}
					helpers.promise({entity: $scope.registerWith, value:$scope.step1[$scope.registerWith], token:$scope.verifycode.code}, 'Please wait ... ', appUrl+'/verify/user/token').then(
							function(response){
								var response = jQuery.parseJSON(JSON.stringify(response.data));
								console.log(response);
								$scope.notification.text = response.text;
								$scope.notification.color = response.color;
								$scope.notification.sending = false;
								if(response.error == false){
									$scope.phoneConfirm = true;
									helpers.collection.registerInfo.userid = response.responseData.userid;
									helpers.collection.registerInfo[$scope.registerWith] = $scope.step1[$scope.registerWith];
								}
							},
							function(errMsg){
								console.log(errMsg);
								$scope.notification.text = errMsg.data.text;
								$scope.notification.sending = false;
							},
							function(notify){
								$scope.notification.text = notify;
								$scope.notification.sending = true;
							}
						);	
				}
			}
			
			
			$scope.notifytMsgText = function(){
				$scope.registerWith == 'phone' ? "OTP Code (We've sent a sms to your phone number)" : "OTP Code (We've sent an OTP to your email)"
			}
			
			
			
		}
	}
}]);

app.directive('regstep2', ['helpers', '$window', '$rootScope', '$q', '$timeout', function( helpers, $window, $rootScope, $q, $timeout){
	return {
		template: function(){
			return $('#tmp_register_step_2').html();
		},
		link: function($scope, $element, $attrs){
			$rootScope.activeClass = 2;
			var countries = helpers.localData.countries;
			$scope.countries = multiCountries;
			
			$scope.old = {
				email: helpers.collection.registerInfo.email,
				phone:helpers.collection.registerInfo.phone,
			}
			
			$scope.step2 = {
				username : "",
				email: helpers.collection.registerInfo.email,
				phone:helpers.collection.registerInfo.phone,
				password : "",
				gender_id : "",
				password_confirmation : "",
				country_code : "",
				user_type_id : "",
				name : "",
			};
			
			
			/**
			id
		country_code
		user_type_id
		gender_id
		name
		phone
		username
		email
		password
		**/	
			
			$scope.$watchCollection('step2', function(newVal, oldVal){
				angular.forEach($scope.step2, function(item, key){
					helpers.collection.registerInfo[key] = newVal[key];
				});
			});

			$scope.submitStep2Form = function(step2ModelData, dest){
				if($scope.step2Form.$valid && (step2ModelData.password === step2ModelData.password_confirmation)) {
					$rootScope.goToNextPage(dest);
				}
				
			}
		}
	}
}]);

app.directive('regstep3', ['helpers', '$window', '$rootScope', '$q', '$timeout', function( helpers, $window, $rootScope, $q, $timeout){
	return {
		template: function(){
			return $('#tmp_register_step_3').html();
		},
		link: function($scope, $element, $attrs){
			$rootScope.activeClass = 3;
		
		}
	}
}]);


app.directive('checkactivation', ['helpers', '$window', '$rootScope', '$q', '$timeout', function( helpers, $window, $rootScope, $q, $timeout){
	return {
		template: function(){
			return $('#tmp_check_activation').html();
		},
		link: function($scope, $element, $attrs){
			$scope.verifyWith = "email";
			$scope.verifyWithType = function(type){
				$scope.verifyWith = type;
			}
			
			$scope.verify = {
				email: "",
				phone : "",
				code : ""
			}
			
			$scope.activationConfirm = false;
			
			$scope.submitcheckActivationForm = function(checkActivationForm, dest){
				if(checkActivationForm.$valid){
					if($scope.activationConfirm == true){
						helpers.collection.registerInfo.term = true;
						$rootScope.goToNextPage(dest);
					}

					helpers.promise({entity: $scope.verifyWith, value:$scope.verify[$scope.verifyWith], token:$scope.verify.code}, 'Please wait ... ', appUrl+'/verify/user/checkactivation').then(
						function(response){
							var response = jQuery.parseJSON(JSON.stringify(response.data));
							$scope.notification.text = response.text;
							$scope.notification.color = response.color;
							$scope.notification.sending = false;
							if(response.error == false){
								$scope.activationConfirm = true;
								helpers.collection.registerInfo.userid = response.responseData.userid;
								helpers.collection.registerInfo[$scope.verifyWith] = $scope.verify[$scope.verifyWith];
							}
						},
						function(errMsg){
							$scope.notification.text = errMsg.data.text;
							$scope.notification.sending = false;
						},
						function(notify){
							$scope.notification.text = notify;
							$scope.notification.sending = true;
						}
					);
				}
			}

		
		}
	}
}]);



app.directive('questionhome', ['helpers', '$window', '$rootScope', '$q', '$timeout', function( helpers, $window, $rootScope, $q, $timeout){
	return {
		template: function(){
			return $('#tmp_question_home').html();
		},
		link: function($scope, $element, $attrs){
			
		
		}
	}
}]);



app.directive('question1', ['helpers', '$window', '$rootScope', '$q', '$timeout', function( helpers, $window, $rootScope, $q, $timeout){
	return {
		template: function(){
			return $('#tmp_question_1').html();
		},
		link: function($scope, $element, $attrs){
			$scope.qsn1 = [
				{answer:"Manufacture/Factory", selected : false},
				{answer:"Online Shop/Store", selected : false},
				{answer:"Trading Company", selected : false},
				{answer:"Retailer", selected : false},
				{answer:"Distributor/Wholesaler", selected : false},
				{answer:"Buying Office", selected : false},
				{answer:"Individual", selected : false},
				{answer:"Other", selected : false},				
			];
		
			
			$scope.selectAnswer = function(index){
				$scope.qsn1.map(function(el){ el.selected = false; });
				$scope.qsn1[index].selected = true;
			}
			
			$scope.goToNextPage = function(dest){
				$scope.qsn1.map(function(el, key){ 
					if(el.selected == true){ 
						$rootScope.goToNextPage(dest);
						helpers.collection.qsns.qsn1 = key;
						return; 
					}
				});
			}
		}
	}
}]);



app.directive('question2', ['helpers', '$window', '$rootScope', '$q', '$timeout', function( helpers, $window, $rootScope, $q, $timeout){
	return {
		template: function(){
			return $('#tmp_question_2').html();
		},
		link: function($scope, $element, $attrs){
			$scope.qsn2 = [
				{answer:"Electronics", selected : false},
				{answer:"Health & Beauty", selected : false},
				{answer:"Packaging & Office", selected : false},
				{answer:"Auto & Transportation", selected : false},
				{answer:"Agriculture & Food", selected : false},
				{answer:"Metallurgy & Plastics", selected : false},
			];

			$scope.selectAnswer = function(index){
				$scope.qsn2.map(function(el){ el.selected = false; });
				$scope.qsn2[index].selected = true;
			}
			
			$scope.goToNextPage = function(dest){
				$scope.qsn2.map(function(el, key){ 
					if(el.selected == true){ 
						$rootScope.goToNextPage(dest);
						helpers.collection.qsns.qsn2 = key;
						return; 
					}
				});
			}

			
		}
	}
}]);


app.directive('question3', ['helpers', '$window', '$rootScope', '$q', '$timeout', function( helpers, $window, $rootScope, $q, $timeout){
	return {
		template: function(){
			return $('#tmp_question_3').html();
		},
		link: function($scope, $element, $attrs){
			$scope.parentCategories = parentCategories;
			$scope.parentCategories.map(function(cat){cat.selected = false;});
			
			$scope.selectAnswer = function(index){
				$scope.parentCategories[index].selected = $scope.parentCategories[index].selected == true ? false : true;
			}
			var selectedCatids = [];
			$scope.goToNextPage = function(dest){
				$scope.parentCategories.map(function(el){ 
					if(el.selected == true){
						selectedCatids.push(el.id);
					}
				});
				
				if(selectedCatids.length > 0){
					helpers.collection.qsns.qsn3 = selectedCatids;
					$rootScope.goToNextPage(dest);
				}
			}

		}
	}
}]);

app.directive('question4', ['helpers', '$window', '$rootScope', '$q', '$timeout', function( helpers, $window, $rootScope, $q, $timeout){
	return {
		template: function(){
			return $('#tmp_question_4').html();
		},
		link: function($scope, $element, $attrs){
			
		
		}
	}
}]);

app.directive('question5', ['helpers', '$window', '$rootScope', '$q', '$timeout', function( helpers, $window, $rootScope, $q, $timeout){
	return {
		template: function(){
			return $('#tmp_question_5').html();
		},
		link: function($scope, $element, $attrs){
			$scope.qsn5 = [
				{answer:"Ability to customize", selected : false},
				{answer:"Has items is stock", selected : false},
				{answer:"Short lead time", selected : false},
				{answer:"Exported to my country", selected : false},
				{answer:"Has a factory", selected : false},
				{answer:"Other", selected : false},
			];

			$scope.selectAnswer = function(index){
				$scope.qsn5.map(function(el){ el.selected = false; });
				$scope.qsn5[index].selected = true;
			}
			
			$scope.goToNextPage = function(dest){
				$scope.qsn5.map(function(el, key){ 
					if(el.selected == true){ 
						helpers.collection.qsns.qsn5 = key;
						$rootScope.goToNextPage(dest);
						return; 
					}
				});
			}

		
		}
	}
}]);


app.directive('registerconfirm', ['helpers', '$window', '$rootScope', '$q', '$timeout', '$location' , function( helpers, $window, $rootScope, $q, $timeout, $location){
	return {
		template: function(){
			return $('#tmp_register_confirm').html();
		},
		link: function($scope, $element, $attrs){
			$scope.appUrl = appUrl;
			
			$scope.notification = "";
			
			$scope.registerConfirm = function(){
				helpers.promise(helpers.collection, 'Please wait ... ', appUrl+'/register').then(
					function(response){
						console.log(response);
						$scope.notification = "Congratulation, Your account is registered successfully! Please login...";
						$window.location.href = appUrl;
					},
					function(errMsg){
						console.log(errMsg);
						$scope.errorMsgs = errMsg.data.data;
						$scope.error = true;
						$scope.notification = errMsg.data.message;
					},
					function(notify){
						$scope.notification = notify;
					}
					
				);	
			}
		}
	}
}]);




app.controller('RegisterController', ['helpers',  '$scope', '$element', '$window', '$rootScope', '$timeout',  '$interval' ,function RegisterController(helpers, $scope, $element, $window, $rootScope, $timeout,  $interval){
	$scope.stepWizard = true;
	$rootScope.activeClass = 1;
	helpers.changeDirs(0,  $scope);
	$rootScope.registerInfo = helpers.collection.registerInfo;
	$rootScope.goToNextPage = function(dest){
		if(dest == 3){
			$scope.stepWizard = false;		
		}
		helpers.changeDirs(dest,  $scope);
	}
	
	
}]);



