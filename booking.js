(function () {
    'use strict';
     /* angular.module('myApp', []); */
	 var app = angular.module('mybookingPage', []);
	 app.config(['$httpProvider', function ($httpProvider) {
    $httpProvider.defaults.useXDomain = true;
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
}]);
    

app.controller('tours_booking',['$scope','$http', function($scope, $http) {
    $http.get("http://130.211.123.212/app/tours")
    .success(function (response) {
		$scope.toursbook = response.Tours;
	
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
			
			
}]); 

app.controller('guides_booking',['$scope','$http', function($scope, $http) {
    $http.get("http://130.211.123.212/app/guides")
    .success(function (response) {
		$scope.guidesbook =response.Guides;
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
  
   
			
}]);

app.controller('placesCtrl',['$scope','$http', function($scope, $http) {
    $http.get("http://130.211.123.212/app/places")
    .success(function (response) {
		$scope.places = response.Places;
	
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