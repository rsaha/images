(function () {
    'use strict';
  
	 var app = angular.module('topTours',  ['ui.bootstrap']);
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
app.controller('customersCrtl',['$scope','$http', function ($scope, $http, $timeout) {
    $http.get('https://gg_admin-prod.apigee.net/guidedgateway/tours?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe')
	.success(function(data){
        $scope.list = data.entities;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 6; //max no of items to display in a page
        $scope.filteredItems = $scope.list.length; //Initially for no filter  
        $scope.totalItems = $scope.list.length;
    });
    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
    };
//    $scope.sort_by = function(predicate) {
//        $scope.predicate = predicate;
//        $scope.reverse = !$scope.reverse;
//    };
    
      $http.get("https://gg_admin-prod.apigee.net/guidedgateway/guides?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
    .success(function (response) {
		$scope.guides = response.entities;
	   
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
    
    $http.get("https://gg_admin-prod.apigee.net/guidedgateway/places?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
    .success(function (response) {
		$scope.places = response.entities;
	   
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
    
       $scope.region_value=function(regionvalue){

        $http.get("https://gg_admin-prod.apigee.net/guidedgateway/tours?ql=tour_territory='"+regionvalue+"'&apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
//        	$http.get("https://gg_admin-prod.apigee.net/guidedgateway/guides?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe&ql=guide_territory='"+regionvalue+"'")
    .success(function (data) {
		  $scope.list = data.entities;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 6; //max no of items to display in a page
        $scope.filteredItems = $scope.list.length; //Initially for no filter  
        $scope.totalItems = $scope.list.length;
             
		})
	.error(function() {
                
				$scope.data = "error in fetching data";
			});
    }
    
 
}]);

     app.filter('searchFor', function(){
    return function(arr, searchString){
        if(!searchString){
            return arr;
        }
        var result = [];
        searchString = searchString.toLowerCase();
       // alert(searchString);
        angular.forEach(arr, function(item){
            var territoryValue =item.tour_territory[0].toLowerCase();
          //  alert(territoryValue);
            if(territoryValue === searchString) {
//                alert(territoryValue);
//                alert(searchString); 
                
            result.push(item);
        alert(JSON.stringify(result));
        }
        });
//        alert(result[0].guide_id);
        
        return result;
    };
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
