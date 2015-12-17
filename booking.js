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

app.controller('guides_booking',['$scope','$http','$location', function($scope, $http,$location) {
     debugger;
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
    $scope.guidePrice=0;
    $scope.adultValue=1;
    $scope.dayValue=1;
    $scope.minTourPrice=0;
    $scope.MinGuidePrice=0;
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
                                         if($scope.transportPrice!=0)
                                             {
                                                 if($scope.transportPrice != $scope.transIDnew.PriceForDay)
                                                     {
                                                         $scope.priceTotal=$scope.priceTotal- $scope.transportPrice + $scope.transIDnew.PriceForDay;
                                                         $scope.transportPrice=$scope.transIDnew.PriceForDay;
                                                     }
                                          
                                         // alert($scope.transportPrice);
                                        // $scope.priceTotal=$scope.priceTotal+ $scope.transportPrice;
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
         
          var guideID = $location.search();
    if(guideID.id2==0)
        {
                      //  alert("hey");
             $scope.guideValue=1;
            $scope.tourValue=guideID.id2;
             $scope.guidePrice=1000;
             $scope.MinGuidePrice=$scope.guidePrice;
             if( $scope.MinGuidePrice <= 2000)
                    {
                        $scope.guidePrice=$scope.guidePrice*4;
                       // $scope.minTourPrice=$scope.tourPrice;
                    }
             $scope.priceTotal= $scope.priceTotal+$scope.guidePrice;
             $http.get("http://130.211.123.212/app/guide?id="+guideID.id1)
   // $http.get("http://130.211.123.212/app/guide?id=10011")
    .success(function (response) {
		$scope.guide=response;
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
        }
   
    
    
     var tourID = $location.search();
         if(tourID.id1==0)
        {
           // alert("hi");
             $scope.tourValue=1;
            $scope.guideValue=tourID.id1;
          
            $http.get("http://130.211.123.212/app/tour?tourid="+tourID.id2)
    .success(function (response) {
		$scope.tour = response;
                $scope.tourPrice=  parseInt($scope.tour.tour_price, 10);
              $scope.minTourPrice=$scope.tourPrice;
                 if( $scope.minTourPrice <= 2000)
                    {
                        $scope.tourPrice=$scope.tourPrice*4;
                       // $scope.minTourPrice=$scope.tourPrice;
                    }
     
               // alert(angular.isNumber($scope.tourPrice));
               
                  $scope.priceTotal= $scope.priceTotal+$scope.tourPrice;
		
		})
	.error(function() {
				$scope.data = "error in fetching data";
			});
        }
    $scope.successValue=0;
    $scope.comparePromo = function(promo,codepromo){
        
//        alert(promo);
//        alert(codepromo);
        if(promo == codepromo)
            {
                if($scope.successValue == 0)
                    {
                 //$scope.priceTotal= $scope.priceTotal-500;
                        $scope.successValue=500;
                    }
            }
    }
    $scope.adultplus= function(adultplusvalue){
         //alert("hey");
        if(tourID.id1==0)
            {
        $scope.adultValue= adultplusvalue +1;
        if($scope.minTourPrice <= 2000)
            {
               // alert("hi");
                if( $scope.adultValue>4)
                    {
                         $scope.tourPrice=$scope.tourPrice+$scope.minTourPrice;
                 $scope.priceTotal= $scope.priceTotal+$scope.minTourPrice;
                    }
               
            }
        else
            {
                $scope.tourPrice=$scope.tourPrice+$scope.minTourPrice;
                 $scope.priceTotal= $scope.priceTotal+$scope.minTourPrice; 
            }
            }
        if(tourID.id2==0)
            {
                       $scope.adultValue= adultplusvalue +1;
                if($scope.MinGuidePrice <= 2000)
                    {
                       // alert("hi");
                        if( $scope.adultValue>4)
                            {
                                 $scope.guidePrice=$scope.guidePrice+$scope.MinGuidePrice;
                                $scope.guidePriceNew= $scope.guidePrice;
                         $scope.priceTotal= $scope.priceTotal+$scope.MinGuidePrice;
                            }

                    }
                else
                    {
                        $scope.guidePrice=$scope.guidePrice+$scope.MinGuidePrice;
                        $scope.guidePriceNew= $scope.guidePrice;
                         $scope.priceTotal= $scope.priceTotal+$scope.MinGuidePrice; 
                    }  
            }
    }
    
     $scope.adultminus= function(adultminusvalue){
         //alert("hey");
         if(tourID.id1==0)
             {
                 if(adultminusvalue !=1)
                     {
                         $scope.adultValue= adultminusvalue - 1;


                if($scope.minTourPrice <= 2000)
                    {
                       // alert("hi");
                        if( $scope.adultValue>=4)
                            {
                                 $scope.tourPrice=$scope.tourPrice-$scope.minTourPrice;
                         $scope.priceTotal= $scope.priceTotal-$scope.minTourPrice;
                            }

                    }
                else
                    {
                        $scope.tourPrice=$scope.tourPrice-$scope.minTourPrice;
                         $scope.priceTotal= $scope.priceTotal-$scope.minTourPrice; 
                    }
                     }
             }
         if(tourID.id2==0)
             {
                if(adultminusvalue !=1)
                     {
                         $scope.adultValue= adultminusvalue - 1;


                if($scope.MinGuidePrice <= 2000)
                    {
                       // alert("hi");
                        if( $scope.adultValue>=4)
                            {
                                 $scope.guidePrice=$scope.guidePrice-$scope.MinGuidePrice;
                                $scope.guidePriceNew= $scope.guidePrice;
                         $scope.priceTotal= $scope.priceTotal-$scope.MinGuidePrice;
                            }

                    }
                else
                    {
                        $scope.guidePrice=$scope.guidePrice-$scope.MinGuidePrice;
                        $scope.guidePriceNew= $scope.guidePrice;
                         $scope.priceTotal= $scope.priceTotal-$scope.MinGuidePrice; 
                    }
                     } 
             }
    }
     $scope.tourdayplus=function(dayplus){
          $scope.dayValue= dayplus +1;

                        $scope.guidePrice= $scope.guidePriceNew*$scope.dayValue;
                       //  $scope.priceTotal= $scope.priceTotal+$scope.guidePriceNew; 
                    
     }
    $scope.tourdayminus=function(dayminus){
         if(dayminus !=1)
                     {
                         $scope.dayValue= dayminus - 1;

                        $scope.guidePrice=$scope.guidePriceNew/$scope.dayValue;
                         //$scope.priceTotal= $scope.priceTotal-$scope.guidePriceNew; 
                    
                     } 
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
    
//app.controller('Singleguide',['$scope','$http','$location', function($scope, $http,$location)  {
//    // alert(valueID);
//                               debugger;
//    
//}]);
//    
//    app.controller('Singletour',['$scope','$http','$location', function($scope, $http,$location) {
//    
//                               debugger;
//    
//			
//        
//		
//			
//}]); 
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