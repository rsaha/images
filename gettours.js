(function () {
    'use strict';
    
	 var app = angular.module('myTours', []);
	 app.config(['$httpProvider', function ($httpProvider) {
    $httpProvider.defaults.useXDomain = true;
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
}]);

app.controller('TourCtrl',['$scope','$http', function($scope, $http) {
    $http.get("https://gg_admin-prod.apigee.net/guidedgateway/tours?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
    .success(function (response) {
		$scope.alltours =response.entities;
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
