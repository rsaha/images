(function () {
    'use strict';
  
	 var app = angular.module('topTours',  ['ui.bootstrap']);
	 app.config(['$httpProvider', function ($httpProvider) {
    $httpProvider.defaults.useXDomain = true;
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
}]);
   

//app.controller('tourDetailCtrl',['$scope','$http','$location', function($scope, $http,$location) {
//    
//                               debugger;
//     var tourID = $location.search();
//    $http.get("http://130.211.123.212/app/tour?tourid="+tourID.id)
//    .success(function (response) {
//		$scope.tour = response;
//		
//		})
//	.error(function() {
//				$scope.data = "error in fetching data";
//			});
//			
//		$scope.attractions=function()
//		{
//		     for(var i=0;i<3;i++)
//		     {
//			
//		     y+=$scope.tour.Itineary.Day.Spots[i].Spot+', '		
//			 }
//			 y=substring(0,lastIndexOf(',')-1);
//			 
//			 return y;
//		}
//		$scope.getdata=function(latitude,longitude){
//			$scope.longit=longitude;
//			alert($scope.longit);
//			$scope.latit=latitude;
//			alert($scope.latit);
//		}
//			
//}]); 
//    app.controller('placesCtrl',['$scope','$http', function($scope, $http) {
//    $http.get("http://130.211.123.212/app/places")
//    .success(function (response) {
//		$scope.places = response.Places;
//	   
//		})
//	.error(function() {
//				$scope.data = "error in fetching data";
//			});
//			
//			
//}]); 
//app.controller('guideDetailCtrl',['$scope','$http', function($scope, $http) {
//    $http.get("http://130.211.123.212/app/guide")
//    .success(function (response) {
//		$scope.guide = response;
//		
//		})
//	.error(function() {
//				$scope.data = "error in fetching data";
//			});
//			
//}]); 

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
app.controller('transportCrtl',['$scope','$http', function ($scope, $http, $timeout) {
    $http.get('http://130.211.123.212/app/transport')
	.success(function(data){
        $scope.list = data.Transport;
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
    
      $http.get("http://130.211.123.212/app/guides")
    .success(function (response) {
		$scope.guides = response.Guides;
	   
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
    
    $http.get("http://130.211.123.212/app/places")
    .success(function (response) {
		$scope.places = response.Places;
	   
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
		$http.get("http://130.211.123.212/app/lodging")
    .success(function (response) {
		$scope.lodging = response.Lodging;
	   
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