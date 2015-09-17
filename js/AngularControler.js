(function () {
    'use strict';
     /* angular.module('myApp', []); */
	 var app = angular.module('myApp', []);
	 
	app.controller('customersCtrl',['$scope','$http', function($scope, $http) {
		$http.get("customers.php")
		.success(function (response) {
			$scope.names = response.records;
		})
		.error(function() {
			$scope.data = "error in fetching data";
		});
	}]);
	
	app.controller('validateLogin', function($scope) {
		$scope.username = '';
		$scope.password = '';
	});
	
	app.controller('validateCtrl', function($scope) {
		$scope.FirstName = '';
		$scope.LastName = '';
		$scope.EmailAddress = '';
		$scope.MobileNumber = '';
		$scope.Password = '';
		$scope.conformpassword = '';
	});
	
	app.controller('validateCtrl2', function($scope) {
		$scope.nickname = '';
		$scope.streetaddress = '';
		$scope.city = '';
		$scope.landlinenumber = '';
	});
	
	app.controller('validateCtrl3', function($scope) {
		$scope.GuideFacebookProfile = '';
		$scope.GuideLinkedinProfile = '';
		$scope.GuidePinterestProfile = '';
		$scope.GuideFacebookProfile = '';
	});
	
	app.controller('validateCtrl4', function($scope) {
		$scope.nameFriend1 = '';
		$scope.emailFriend1 = '';
		$scope.mobileFeiend1 = '';
		$scope.nameFriend2 = '';
		$scope.emailFriend2 = '';
		$scope.mobileFeiend2 = '';
		$scope.nameFriend3 = '';
		$scope.emailFriend3 = '';
		$scope.mobileFeiend3 = '';
	});
	
	app.controller('validateCtrl5', function($scope) {
		$scope.nameFriend1 = '';
		$scope.emailFriend1 = '';
		$scope.mobileFeiend1 = '';
	});
	
	app.controller('profileEditValidateCtrl', function($scope) {
		$scope.firstName = '';
		$scope.lastName = '';
		$scope.streetaddress = '';
		$scope.city = '';
		$scope.licencenumber = '';
		$scope.landlinenumber = '';
	});
	
	app.controller('forgetPasswordValidateCtrl', function($scope) {
		$scope.username = '';
		$scope.emailid = '';
		$scope.monileno = '';
	});
	
	app.controller('resetPswrdvalidateCtrl', function($scope) {
		$scope.oldPassword = '';
		$scope.newPassword = '';
		$scope.conformpassword = '';
	});
})();