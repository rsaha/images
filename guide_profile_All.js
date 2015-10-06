(function () {
    'use strict';
    
	 var app = angular.module('myAllGuide', []);
	 app.config(['$httpProvider', function ($httpProvider) {
    $httpProvider.defaults.useXDomain = true;
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
}]);

app.controller('guideControl',['$scope','$http', function($scope, $http) {
    $http.get("http://130.211.123.212/app/guide?id=10005")
    .success(function (response) {
		$scope.allguides=response;
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
}]);

	app.controller('validateCtrlNew', function($scope) {
		$scope.name = '';
		$scope.email = '';
		$scope.subject = '';
		$scope.Message = '';
		
	});
app.controller('TourControl',['$scope','$http', function($scope, $http) {
    $http.get("http://130.211.123.212/app/tours")
    .success(function (response) {
		$scope.alltours = response.Tours;
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
}]);
app.directive('starRating', function () {
    return {
        restrict: 'A',
        template: '<ul class="rating">' +
            '<li ng-repeat="star in stars" ng-class="star">' +
            '\u2605' +
            '</li>' +
            '</ul>',
        scope: {
            ratingValue: '=',
           
        },
        link: function (scope, elem, attrs) {
            scope.stars = [];
            for (var i = 0; i < 5; i++) {
                scope.stars.push({
                    filled: i < scope.ratingValue
                });
            }
        }
    }
});
})();