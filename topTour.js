(function () {
    'use strict';
  
	 var app = angular.module('topTours', []);
	 app.config(['$httpProvider', function ($httpProvider) {
    $httpProvider.defaults.useXDomain = true;
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
}]);

app.controller('toursCtrl',['$scope','$http', function($scope, $http) {
    $http.get("http://130.211.123.212/app/tours")
    .success(function (response) {
		$scope.tours = response.Tours;
	   
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
			
			
}]); 

app.controller('tourDetailCtrl',['$scope','$http', function($scope, $http) {
    $http.get("http://130.211.123.212/app/tour")
    .success(function (response) {
		$scope.tour = response;
		
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
			
		$scope.attractions=function()
		{
		     for(var i=0;i<3;i++)
		     {
			
		     y+=$scope.tour.Itineary.Day.Spots[i].Spot+', '		
			 }
			 y=substring(0,lastIndexOf(',')-1);
			 
			 return y;
		}
			
			
}]); 
app.controller('guideDetailCtrl',['$scope','$http', function($scope, $http) {
    $http.get("http://130.211.123.212/app/guide")
    .success(function (response) {
		$scope.guide = response;
		
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