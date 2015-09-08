(function () {
    'use strict';
     /* angular.module('myApp', []); */
	 var app = angular.module('myDestinations', []);
	 app.config(['$httpProvider', function ($httpProvider) {
    $httpProvider.defaults.useXDomain = true;
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
}]);
app.controller('destinationCtrl',['$scope','$http', function($scope, $http) {
    $http.get("http://130.211.123.212/app/tours")
    .success(function (response) {
		$scope.names = response.Guides;
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
}]);
app.controller('guideCtrl',['$scope','$http', function($scope, $http) {
    $http.get("http://130.211.123.212/app/guides")
    .success(function (response) {
		$scope.allguides =response.Guides;
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
}]);

})();