(function () {
    'use strict';
     /* angular.module('myApp', []); */
	 var app = angular.module('myGuideDetails', []);
	 app.config(['$httpProvider', function ($httpProvider) {
    $httpProvider.defaults.useXDomain = true;
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
}]);
app.controller('guideCtrl',['$scope','$http', function($scope, $http) {
    $http.get("http://130.211.123.212/app/guides")
    .success(function (response) {
		$scope.allguides =response.guides;
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
}]);


})();