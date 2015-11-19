(function ($scope, $location) {
    'use strict';
 
    var urlstring=0;
    var valueID=0;
	 var app = angular.module('myAllGuide', []);
    
	 app.config(['$httpProvider', function ($httpProvider) {
    $httpProvider.defaults.useXDomain = true;
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
}]);

//     app.controller('Ctrl',['$scope','$scope',function($scope, $location) {
//    
//    valueID = $location.search().guideID;
//       
//  alert(valueID);
//			
//}]);
app.controller('guideControl',['$scope','$http','$location', function($scope, $http,$location)  {
    // alert(valueID);
                               debugger;
     var guideID = $location.search();
    $http.get("http://130.211.123.212/app/guide?id="+guideID.id2)
   // $http.get("http://130.211.123.212/app/guide?id=10011")
    .success(function (response) {
		$scope.guidesdetail=response;
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
}]);
    app.controller('Allguides',['$scope','$http', function($scope, $http) {
    // alert(valueID);
    //$http.get("http://130.211.123.212/app/guide?id="+valueID)
    $http.get("http://130.211.123.212/app/guide?id=10011")
    .success(function (response) {
		$scope.allguides=response;
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
}]);
app.controller('TopGuideControl',['$scope','$http', function($scope, $http) {
    $http.get("http://130.211.123.212/app/guides")
    .success(function (response) {
		$scope.TopGuides=response.Guides;
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
app.controller('TourControl',['$scope','$http','$location', function($scope, $http,$location) {
    var ids = $location.search().id2;
    $scope.idn=ids;
  
    $http.get("http://130.211.123.212/app/tours")
    .success(function (response) {
		$scope.alltours = response.Tours;
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
}]);
    
    app.controller('NewTour',['$scope','$http','$location', function($scope, $http,$location) {
    var ids = $location.search().id2;
    //$scope.idn=ids;
  
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