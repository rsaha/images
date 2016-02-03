(function () {
    'use strict';
     /* angular.module('myApp', []); */
	 var app = angular.module('myGuideDetails', []);
	 app.config(['$httpProvider', function ($httpProvider) {
    $httpProvider.defaults.useXDomain = true;
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
}]);
app.controller('guideCtrl',['$scope','$http', function($scope, $http) {
    $http.get("http://gg_admin-test.apigee.net/guidedgateway/guides?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
    .success(function (response) {
		$scope.allguides =response.entities;
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
}]);


})();
