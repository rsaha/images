(function () {
    'use strict';
     /* angular.module('myApp', []); */
	 var app = angular.module('myDestinations', []);
	 app.config(['$httpProvider', function ($httpProvider) {
    $httpProvider.defaults.useXDomain = true;
         delete $httpProvider.defaults.headers.common['X-Requested-With'];
//         $httpProvider.defaults.withCredentials = true;
//    
//         $httpProvider.defaults.headers.common["Accept"] = "application/json";
//$httpProvider.defaults.headers.common["Content-Type"] = "application/json";
}]);
    


    app.controller('MultipleCtrl',['$scope','$http', function($scope, $http) {
         $scope.placename='';
          $scope.checkboxModel = {
       value1 : true,
	   value2 : true,
	   value3 : true,
       /* value2 : 'YES' */
     };
        $scope.toValue=function(valueto){
            alert(valueto);
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
		$scope.allguides =response.entities;
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
        	
        $http.get("https://gg_admin-prod.apigee.net/guidedgateway/transports?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
    .success(function (response) {
		$scope.transList =response.entities;
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
        
       $scope.placeName=function(placeName){
            $scope.search=placeName;
//           alert(  $scope.placename);
//           alert("hi");
        }
        
         $http.get("https://gg_admin-prod.apigee.net/guidedgateway/places?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
    .success(function (response) {
		$scope.places = response.entities;
	
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
}]); 
    
    app.controller('guideIDCtrl',function($scope, $location) {
    
    $scope.setID=function(setGuideID){
      $scope.gID=setGuideID;
			$location.search("guideID",setGuideID);
		}
			
});

 app.controller('ExampleController', ['$scope', function($scope) {
      $scope.checkboxModel = {
       value1 : true,
	   value2 : true,
	   value3 : true,
       /* value2 : 'YES' */
     };
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
