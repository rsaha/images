(function () {
    'use strict';
  
	 var app = angular.module('topPlaces', []);
	 app.config(['$httpProvider', function ($httpProvider) {
    $httpProvider.defaults.useXDomain = true;
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
}]);

app.controller('placesCtrl',['$scope','$http', function($scope, $http) {
    $http.get("http://gg_admin-prod.apigee.net/guidedgateway/places")
    .success(function (response) {
		$scope.places = response.Places;
	   
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
			
			
}]); 
// app.controller('tourCtrl',['$scope','$http', function($scope, $http) {
//    $http.get("http://gg_admin-prod.apigee.net/guidedgateway/tours")
//    .success(function (response) {
//		$scope.alltours =response.Tours;
//		})
//	.error(function() {
//				$scope.data = "error in fetching data";
//			});
//}]);
//    app.controller('guidescontrol',['$scope','$http', function($scope, $http) {
//    $http.get("http://gg_admin-prod.apigee.net/guidedgateway/guides")
//    .success(function (response) {
//		$scope.guides = response.Guides;
//	   
//		})
//	.error(function() {
//				$scope.data = "error in fetching data";
//			});
//			
//			
//}]);
//     app.config(['$routeProvider',function($routeProvider, $locationProvider) {
//
//        $routeProvider
//            .when('/', {
//                templateUrl : 'partials/index.php',
//                controller : placeDetailCtrl
//            })
//            .when('/toptours', {
//                templateUrl : 'partials/toptours',
//                controller : placeDetailCtrl
//            })
//            .when('/topguides', {
//                templateUrl : 'partials/topguides',
//                controller : placeDetailCtrl
//            });
        //      .when('/lodging', {
        //                templateUrl : 'partials/lodging',
        //                controller : placeDetailCtrl
        //            });
//        // use the HTML5 History API
//        $locationProvider.html5Mode(true);
//     }]);
//    
app.controller('placeDetailCtrl',['$scope','$http','$location', function($scope, $http,$location) {
    var placeid = $location.search();
    $http.get("http://gg_admin-prod.apigee.net/guidedgateway/place?placeid="+placeid.id3)
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
		
      $http.get("http://gg_admin-prod.apigee.net/guidedgateway/tours")
    .success(function (response) {
		$scope.alltours =response.Tours;
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
    
			
    $http.get("http://gg_admin-prod.apigee.net/guidedgateway/guides")
    .success(function (response) {
		$scope.guides = response.Guides;
	   
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
    
     $http.get("http://gg_admin-prod.apigee.net/guidedgateway/lodging")
    .success(function (response) {
		$scope.lodging = response.Lodging;
	   
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
    
}]); 
//     app.controller('hotelControl',['$scope','$http', function($scope, $http) {
//    $http.get("http://gg_admin-prod.apigee.net/guidedgateway/lodging")
//    .success(function (response) {
//		$scope.lodging = response.Lodging;
//	   
//		})
//	.error(function() {
//				$scope.data = "error in fetching data";
//			});
//			
//			
//}]);
//    app.controller('AllplaceCtrl',['$scope','$http', function($scope, $http) {
//    $http.get("http://gg_admin-prod.apigee.net/guidedgateway/places")
//    .success(function (response) {
//		$scope.places = response.Places;
//		
//		})
//	.error(function() {
//				$scope.data = "error in fetching data";
//			});
//			
//	
//			
//}]); 
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