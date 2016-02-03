(function () {
    'use strict';
    
	 var app = angular.module('myGuideList', ['ui.bootstrap']);
	 app.config(['$httpProvider', function ($httpProvider) {
    $httpProvider.defaults.useXDomain = true;
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
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
     $scope.checkboxModel = {
       value1 : 'Eastern Region',
	   value2 : 'Western Region',
	   value3 : 'Northern Region',
          value4 : 'Southern Region',
          value5 : 'Central Region'
       /* value2 : 'YES' */
     };
    $http.get('http://gg_admin-test.apigee.net/guidedgateway/guides?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe')
	.success(function(data){
        $scope.list = data.entities;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 12; //max no of items to display in a page
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
    
    
     $http.get("http://gg_admin-test.apigee.net/guidedgateway/tours?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
    .success(function (response) {
		$scope.alltours =response.entities;
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
    
     $http.get("http://gg_admin-test.apigee.net/guidedgateway/places?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
    .success(function (response) {
		$scope.allplaces =response.entities;
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
    
     $http.get("http://gg_admin-test.apigee.net/guidedgateway/lodgings?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
    .success(function (response) {
		$scope.lodging = response.entities;
	   
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
//    $scope.sort_by = function(predicate) {
//        $scope.predicate = predicate;
//        $scope.reverse = !$scope.reverse;
//    };
}]);

})();
