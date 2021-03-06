(function () {
    'use strict';
  
	 var app = angular.module('topPlaces', []);
	 app.config(['$httpProvider', function ($httpProvider) {
    $httpProvider.defaults.useXDomain = true;
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
}]);

app.controller('placesCtrl',['$scope','$http', function($scope, $http) {
    $http.get("https://gg_admin-prod.apigee.net/guidedgateway/places?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
    .success(function (response) {
		$scope.places = response.entities;
	   
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
			
			
}]); 
app.controller('placeDetailCtrl',['$scope','$http','$location', function($scope, $http,$location) {
    var placeid = $location.search();
    $http.get("https://gg_admin-prod.apigee.net/guidedgateway/places?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe&ql=ID="+placeid.id3)
    .success(function (response) {
		$scope.place = response.entities[0];
		
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
			
		/*$scope.attractions=function()
		{
		     for(var i=0;i<3;i++)
		     {
			
		     y+=$scope.tour.Itineary.Day.Spots[i].Spot+', '		
			 }
			 y=substring(0,lastIndexOf(',')-1);
			 
			 return y;
		}*/
		
      $http.get("https://gg_admin-prod.apigee.net/guidedgateway/tours?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
    .success(function (response) {
		$scope.alltours =response.entities;
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
    
			
    $http.get("https://gg_admin-prod.apigee.net/guidedgateway/guides?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
    .success(function (response) {
		$scope.guides = response.entities;
	   
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
    
     $http.get("https://gg_admin-prod.apigee.net/guidedgateway/lodgings?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
    .success(function (response) {
		$scope.lodging = response.entities;
	   
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
