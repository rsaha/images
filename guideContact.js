(function () {
    'use strict';
     /* angular.module('myApp', []); */
	 var app = angular.module('myApp', []);
	
	app.controller('validateCtrlNew', function($scope) {
		$scope.name = '';
		$scope.email = '';
		$scope.subject = '';
		$scope.Message = '';
		
	});

})();