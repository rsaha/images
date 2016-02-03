(function () {
    'use strict';

    var app = angular.module('topTours', ['ui.bootstrap']);
    app.config(['$httpProvider', function ($httpProvider) {
        $httpProvider.defaults.useXDomain = true;
        delete $httpProvider.defaults.headers.common['X-Requested-With'];
      //   $httpProvider.defaults.withCredentials = false;
        // $httpProvider.defaults.headers.common = 'Content-Type: application/json';
          
}]);

    // paging code 
    app.filter('startFrom', function () {
        return function (input, start) {
            if (input) {
                start = +start; //parse to int
                return input.slice(start);
            }
            return [];
        }
    });
   // $scope.trasportlist;
    var trasportlistModel ;
    app.controller('transportCrtl', ['$scope', '$http', function ($scope, $http, $timeout) {
        
        $http.get('http://gg_admin-test.apigee.net/guidedgateway/transports?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe')
            .success(function (data) {
                $scope.list = data.entities;
            
               trasportlistModel = data.entities;
           // alert(trasportlistModel[0].ID);
                $scope.currentPage = 1; //current page
                $scope.entryLimit = 6; //max no of items to display in a page
                $scope.filteredItems = $scope.list.length; //Initially for no filter  
                $scope.totalItems = $scope.list.length;
            });
        $scope.setPage = function (pageNo) {
            $scope.currentPage = pageNo;
        };
        $scope.filter = function () {
            $timeout(function () {
                $scope.filteredItems = $scope.filtered.length;
            }, 10);
        };
        //    $scope.sort_by = function(predicate) {
        //        $scope.predicate = predicate;
        //        $scope.reverse = !$scope.reverse;
        //    };
        $scope.transportDetailModalShow = function (carid) {
           // alert(carid);
          //  alert(trasportlistModel[0].ID);
//          var hello=  $('#lblDistance').val(function(value){
//               return value;
//          });
           // alert(hello);
         // alert($scope.lenghtInKM);
            for (var i = 0, len = trasportlistModel.length; i < len; i++) {
                if (carid === trasportlistModel[i].ID) {
                   // alert("hi");
                    $scope.trasportlist = trasportlistModel[i];
                    break;
                }
               
            }
             $('#transportDetailModal').modal('show');
        }
        
        $http.get("http://gg_admin-test.apigee.net/guidedgateway/guides?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
            .success(function (response) {
                $scope.guides = response.entities;

            })
            .error(function () {
                $scope.data = "error in fetching data";
            });

        $http.get("http://gg_admin-test.apigee.net/guidedgateway/places?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
            .success(function (response) {
                $scope.places = response.entities;
            var placeslist = response.entities;
	      $scope.placesforDropdown=[];
                for (var i = 0, len = placeslist.length; i < len; i++) {
                 $scope.placesforDropdown.push(placeslist[i].PlaceName);
                      
                    }

            })
            .error(function () {
                $scope.data = "error in fetching data";
            });
        $http.get("http://gg_admin-test.apigee.net/guidedgateway/lodgings?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
            .success(function (response) {
                $scope.lodging = response.entities;

            })
            .error(function () {
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
