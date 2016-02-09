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
    $http.get("https://gg_admin-prod.apigee.net/guidedgateway/guide?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe&id="+guideID.id2)
    .success(function (response) {
		$scope.guidesdetail=response.entities[0];
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
    
     var ids2 = $location.search().id2;
    //$scope.idn=ids;
  
    $http.get("https://gg_admin-prod.apigee.net/guidedgateway/tours?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
    .success(function (response) {
		var tourlist = response.entities;
         $scope.tourfound='';
        for(var i=0,len=tourlist.length;i<len;i++){
            
            if(tourlist[i].guide_id === ids2)
                {
                   
                      if(tourlist[i].photo[0]!= null | tourlist[i].photo[0]!= ' ')
                          {
//                           alert(tourlist[i].guide_id );
                    var urlphoto=tourlist[i].photo[0];
                    $scope.tourfound=urlphoto;
                    break;
                          }
                }
        }
        
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
    
     var ids = $location.search().id2;
    $scope.idn=ids;
  
    $http.get("https://gg_admin-prod.apigee.net/guidedgateway/tours?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
    .success(function (response) {
		$scope.alltours = response.entities;
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});

     $http.get("https://gg_admin-prod.apigee.net/guidedgateway/guides?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
    .success(function (response) {
		$scope.TopGuides=response.entities;
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
