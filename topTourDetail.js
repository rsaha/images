(function () {
    'use strict';
  
	 var app = angular.module('topTours',  []);
	 app.config(['$httpProvider', function ($httpProvider) {
    $httpProvider.defaults.useXDomain = true;
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
}]);
   app.directive('helloMaps', function () {
      return function (scope, elem, attrs) {
        var mapOptions,
          latitude = attrs.latitude,
          longitude = attrs.longitude,
          map;
        latitude = latitude && parseFloat(latitude, 10) || 28.6466773;
        longitude = longitude && parseFloat(longitude, 10) || 76.813073;
        mapOptions = {
          zoom: 8,
          center: new google.maps.LatLng(latitude, longitude)
        };
        map = new google.maps.Map(elem[0], mapOptions);
      };
    });

app.controller('tourDetailCtrl',['$scope','$http','$location', function($scope, $http,$location) {
    
                               debugger;
     var tourID = $location.search();
    $http.get("https://gg_admin-prod.apigee.net/guidedgateway/tour?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe&tourid="+tourID.id)
    .success(function (response) {
		$scope.tour = response.entities[0];
		
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
		$scope.getdata=function(latitude,longitude){
			$scope.longit=longitude;
			alert($scope.longit);
			$scope.latit=latitude;
			alert($scope.latit);
		}
		
       $http.get("https://gg_admin-prod.apigee.net/guidedgateway/tours?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
    .success(function (response) {
		$scope.tours = response.entities;
	   
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
        // paging code 
    app.filter('startFrom', function() {
    return function(input, start) {
        if(input) {
            start = +start; //parse to int
            return input.slice(start);
        }
        return [];
    }
});


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
