(function () {
    'use strict';
  
	 var app = angular.module('topPlaces', ['ui.bootstrap']);
	 app.config(['$httpProvider', function ($httpProvider) {
    $httpProvider.defaults.useXDomain = true;
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
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
    $http.get('http://130.211.123.212/app/places')
	.success(function(data){
        $scope.list = data.Places;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 3; //max no of items to display in a page
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
}]);
    
 app.controller('tourCtrl',['$scope','$http', function($scope, $http) {
    $http.get("http://130.211.123.212/app/tours")
    .success(function (response) {
		$scope.alltours =response.Tours;
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
}]);
    app.controller('guidescontrol',['$scope','$http', function($scope, $http) {
    $http.get("http://130.211.123.212/app/guides")
    .success(function (response) {
		$scope.guides = response.Guides;
	   
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
			
			
}]);
app.controller('placeDetailCtrl',['$scope','$http','$location', function($scope, $http,$location) {
    var placeid = $location.search();
    $http.get("http://130.211.123.212/app/place?placeid="+placeid.id3)
    .success(function (response) {
		$scope.place = response;
		
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
			
			
}]); 
     app.controller('hotelControl',['$scope','$http', function($scope, $http) {
    $http.get("http://130.211.123.212/app/lodging")
    .success(function (response) {
		$scope.lodging = response.Lodging;
	   
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
			
			
}]);
    app.controller('AllplaceCtrl',['$scope','$http', function($scope, $http) {
    $http.get("http://130.211.123.212/app/places")
    .success(function (response) {
		$scope.places = response.Places;
		
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