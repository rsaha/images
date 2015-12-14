(function () {
    'use strict';
     /* angular.module('myApp', []); */
	 var app = angular.module('mybookingPage', []);
	 app.config(['$httpProvider', function ($httpProvider) {
    $httpProvider.defaults.useXDomain = true;
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
}]);
    
 
//app.controller('tours_booking',['$scope','$http', function($scope, $http) {
//  
//			
//}]); 

app.controller('guides_booking',['$scope','$http', function($scope, $http) {
    $http.get("http://130.211.123.212/app/guides")
    .success(function (response) {
		$scope.guidesbook =response.Guides;
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
    $http.get("http://130.211.123.212/app/tours")
    .success(function (response) {
		$scope.toursbook = response.Tours;
	
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
			
    $scope.priceTotal=0;
    $scope.tourPrice=0;
    $scope.lodgingPrice=0;
    $scope.transportPrice=0;
    
    $scope.priceTotal= $scope.tourPrice+$scope.lodgingPrice+ $scope.transportPrice;
    
      $scope.lodgeIDnew=0;
    $http.get("http://130.211.123.212/app/lodging")
    .success(function (response) {
		$scope.lodging =response.Lodging;
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
        
  $scope.lodgeID=function(lodgeID){
   
                   //  alert(lodgeID);

                     $http.get("http://130.211.123.212/app/lodging")
                         .success(function (response) {
                                 //$scope.transport =response.Transport;

                                 var lodgelist = response.Lodging;
                                // $scope.tourfound = '';
                                 for (var i = 0, len = lodgelist.length; i < len; i++) {

                                     if (lodgelist[i].ID === lodgeID) {
                                         $scope.lodgeIDnew = lodgelist[i];
                                      //   alert("hi");
                                       //  alert( $scope.lodgeIDnew.ID);
                                         $scope.lodgevalue=$scope.lodgeIDnew.ID;
                                            if( $scope.lodgingPrice==0)
                                                {
                                         $scope.lodgingPrice=$scope.lodgeIDnew.PricePerNight;
                                        // alert($scope.lodgingPrice);
                                          $scope.priceTotal=$scope.priceTotal+ $scope.lodgingPrice;
                                                }
                                         break;


                                     }
                                 }
                                     })
                                 .error(function () {
                                     $scope.data = "error in fetching data";
                                 });
                                 //$scope.lodgeIDnew2 = lodgeID;
                             
  $scope.closelodge = function () {
     $scope.lodgevalue = 0;
     if ($scope.lodgingPrice != 0) {
         // alert($scope.lodgingPrice);
         $scope.priceTotal = $scope.priceTotal - $scope.lodgingPrice;
                  $scope.lodgingPrice = 0;

     }
 }
      
  }
   $scope.lodgeIDSelected =0;
  $scope.lodgingModel=function(lodgeSelected){
     // $scope.lodgeIsVisible=1;
    // alert(lodgeSelected);
      
        $http.get("http://130.211.123.212/app/lodging")
                         .success(function (response) {
                                 //$scope.transport =response.Transport;

                                 var totallodgelist = response.Lodging;
                                
                                 for (var i = 0, len = totallodgelist.length; i < len; i++) {

                                     if (totallodgelist[i].ID === lodgeSelected) {
                                         $scope.lodgeIDSelected = totallodgelist[i];
                                        //alert("hi");
                                      
                                         break;


                                     }
                                 }
                                     })
                                 .error(function () {
                                     $scope.data = "error in fetching data";
                                 });
       $('#lodgingDetailModal').modal('show');
      
  }
   
    $scope.transIDnew = 0;
                 $http.get("http://130.211.123.212/app/transport")
                     .success(function (response) {
                         $scope.transport = response.Transport;
                     })
                     .error(function () {
                         $scope.data = "error in fetching data";
                     });

                 $scope.transID = function (transID) {
                    // alert(transID);

                     $http.get("http://130.211.123.212/app/transport")
                         .success(function (response) {
                                 //$scope.transport =response.Transport;

                                 var translist = response.Transport;
                                // $scope.tourfound = '';
                                 for (var i = 0, len = translist.length; i < len; i++) {

                                     if (translist[i].ID === transID) {
                                         $scope.transIDnew = translist[i];
                                       //  alert("hi");
                                        // alert( $scope.transIDnew.ID);
                                         $scope.transvalue=$scope.transIDnew.ID;
                                         if($scope.transportPrice==0)
                                             {
                                          $scope.transportPrice=$scope.transIDnew.PriceForDay;
                                         // alert($scope.transportPrice);
                                         $scope.priceTotal=$scope.priceTotal+ $scope.transportPrice;
                                             }
                                         break;


                                     }
                                 }
                                     })
                                 .error(function () {
                                     $scope.data = "error in fetching data";
                                 });
                                 //$scope.lodgeIDnew2 = lodgeID;
                             }
                     
		$scope.closetrans = function ()	{
		    $scope.transvalue=0;
            if ($scope.transportPrice != 0) {
    // alert($scope.transportPrice);
    $scope.priceTotal = $scope.priceTotal - $scope.transportPrice;
                    $scope.transportPrice = 0;

}
		}
        
         $scope.transportModel=function(){
      $('#transportDetailModal').modal('show');
  }
}]);
    
//    app.controller('hotel_booking',['$scope','$http','$location', function($scope, $http,$location) {
//        debugger;
//     
//			
//}]);
//    
//      app.controller('transport_booking', ['$scope', '$http', function ($scope, $http) {
//                 debugger;
//               
//
//                         }]);
    
app.controller('Singleguide',['$scope','$http','$location', function($scope, $http,$location)  {
    // alert(valueID);
                               debugger;
     var guideID = $location.search();
    if(guideID.id2==0)
        {
             $scope.guideValue=1;
            $scope.tourValue=guideID.id2;
        }
    $http.get("http://130.211.123.212/app/guide?id="+guideID.id1)
   // $http.get("http://130.211.123.212/app/guide?id=10011")
    .success(function (response) {
		$scope.guide=response;
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
}]);
    
    app.controller('Singletour',['$scope','$http','$location', function($scope, $http,$location) {
    
                               debugger;
     var tourID = $location.search();
         if(tourID.id1==0)
        {
             $scope.tourValue=1;
            $scope.guideValue=tourID.id1;
        }
    $http.get("http://130.211.123.212/app/tour?tourid="+tourID.id2)
    .success(function (response) {
		$scope.tour = response;
  
		
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
			
        
		
			
}]); 
//app.controller('placesCtrl',['$scope','$http', function($scope, $http) {
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