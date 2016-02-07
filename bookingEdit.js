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

    app.controller('guides_booking', ['$scope', '$http', '$location', function ($scope, $http, $location) {
        debugger;
        $scope.GUIDEid = 0;
        $scope.TOURid = 0;
        $scope.TRANSPORTid = 0;
        $scope.transportbookValue = 0;



        //        $scope.transportbookValue = 0;
        // $scope.transportBook =0;
        $http.get("https://gg_admin-prod.apigee.net/guidedgateway/places?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
            .success(function (response) {
                //	$scope.placescomplete = response.entities;
                var placeslist = response.entities;
                $scope.placesforDropdown = [];
                for (var i = 0, len = placeslist.length; i < len; i++) {
                    $scope.placesforDropdown.push(placeslist[i].PlaceName);

                }

            })
            .error(function () {
                $scope.data = "error in fetching data";
            });


        $http.get("https://gg_admin-prod.apigee.net/guidedgateway/guides?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
            .success(function (response) {
                $scope.guidesbook = response.entities;
            })
            .error(function () {
                $scope.data = "error in fetching data";
            });
        $http.get("https://gg_admin-prod.apigee.net/guidedgateway/tours?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
            .success(function (response) {
                $scope.toursbook = response.entities;

            })
            .error(function () {
                $scope.data = "error in fetching data";
            });

        $scope.priceTotal = 0;
        $scope.tourPrice = 0;
        $scope.guidePrice = 0;
        $scope.adultValue = 1;
        $scope.dayValue = 1;
        $scope.minTourPrice = 0;
        $scope.MinGuidePrice = 0;
        $scope.lodgingPrice = 0;
        $scope.transportPrice = 0;
        $scope.guidePriceNew = 1;
        $scope.lodgeIDSelected = 0;
        $scope.child = 0;

        $scope.priceTotal = $scope.tourPrice + $scope.lodgingPrice + $scope.transportPrice;

        $scope.lodgeIDnew = 0;
        $http.get("https://gg_admin-prod.apigee.net/guidedgateway/lodgings?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
            .success(function (response) {
                $scope.lodging = response.entities;
            })
            .error(function () {
                $scope.data = "error in fetching data";
            });

        $scope.lodgeID = function (lodgeID) {

            //  alert(lodgeID);

            $http.get("https://gg_admin-prod.apigee.net/guidedgateway/lodgings?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
                .success(function (response) {
                    //$scope.transport =response.Transport;

                    var lodgelist = response.entities;
                    // $scope.tourfound = '';
                    for (var i = 0, len = lodgelist.length; i < len; i++) {

                        if (lodgelist[i].ID === lodgeID) {
                            $scope.lodgeIDnew = lodgelist[i];
                            //   alert("hi");
                            //  alert( $scope.lodgeIDnew.ID);
                            $scope.lodgevalue = $scope.lodgeIDnew.ID;
                            if ($scope.lodgingPrice == 0) {
                                $scope.lodgingPrice = $scope.lodgeIDnew.PricePerNight;
                                // alert($scope.lodgingPrice);
                                $scope.priceTotal = $scope.priceTotal + $scope.lodgingPrice;
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
            $scope.closelodge = function () {
                $scope.lodgevalue = 0;
                if ($scope.lodgingPrice != 0) {
                    // alert($scope.lodgingPrice);
                    $scope.priceTotal = $scope.priceTotal - $scope.lodgingPrice;
                    $scope.lodgingPrice = 0;

                }
            }

        

        $scope.lodgingModel = function (lodgeSelected) {
            // $scope.lodgeIsVisible=1;
            // alert(lodgeSelected);

            $http.get("https://gg_admin-prod.apigee.net/guidedgateway/lodgings?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
                .success(function (response) {
                    //$scope.transport =response.Transport;

                    var totallodgelist = response.Lodging;

                    for (var i = 0, len = totallodgelist.length; i < len; i++) {

                        if (totallodgelist[i].ID === lodgeSelected) {
                            $scope.lodgeIDSelected = totallodgelist[i];
                            //                                        alert("hi");
                            //                                      alert($scope.lodgeIDSelected.City);
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
        $http.get("https://gg_admin-prod.apigee.net/guidedgateway/transports?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
            .success(function (response) {
                $scope.transport = response.entities;
            })
            .error(function () {
                $scope.data = "error in fetching data";
            });

        $scope.transID = function (transID) {
            // alert(transID);

            $http.get("https://gg_admin-prod.apigee.net/guidedgateway/transports?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
                .success(function (response) {
                    //$scope.transport =response.Transport;

                    var translist = response.entities;
                    // $scope.tourfound = '';
                    for (var i = 0, len = translist.length; i < len; i++) {

                        if (translist[i].ID === transID) {
                            $scope.transIDnew = translist[i];
                            //  alert("hi");
                            // alert( $scope.transIDnew.ID);
                            $scope.transvalue = $scope.transIDnew.ID;
                            if ($scope.transportPrice == 0) {
                                $scope.transportPrice = 0; //$scope.transIDnew.PriceForDay;
                                // alert($scope.transportPrice);
                                $scope.priceTotal = $scope.priceTotal + $scope.transportPrice;
                            }
                            if ($scope.transportPrice != 0) {
                                if ($scope.transportPrice != $scope.transIDnew.PriceForDay) {
                                    $scope.priceTotal = $scope.priceTotal - $scope.transportPrice; // + $scope.transIDnew.PriceForDay;
                                    $scope.transportPrice = 0; //$scope.transIDnew.PriceForDay;
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

        $scope.closetrans = function () {
            $scope.transvalue = 0;
            if ($scope.transportPrice != 0) {
                // alert($scope.transportPrice);
                $scope.priceTotal = $scope.priceTotal - $scope.transportPrice;
                $scope.transportPrice = 0;

            }
        }

        $scope.transportModel = function (transSelected) {
            $http.get("https://gg_admin-prod.apigee.net/guidedgateway/transports?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
                .success(function (response) {
                    //$scope.transport =response.Transport;

                    var totaltranslist = response.entities;

                    for (var i = 0, len = totaltranslist.length; i < len; i++) {

                        if (totaltranslist[i].ID === transSelected) {
                            $scope.transIDSelected = totaltranslist[i];
                            //                                        alert("hi");
                            //                                      alert($scope.transIDSelected.City);
                            break;


                        }
                    }
                })
                .error(function () {
                    $scope.data = "error in fetching data";
                });
            $('#transportDetailModal').modal('show');
        }





        $scope.successValue = 0;
        $scope.comparePromo = function (promo, codepromo) {

            //        alert(promo);
            //        alert(codepromo);
            if (promo == codepromo) {
                if ($scope.successValue == 0) {
                    //$scope.priceTotal= $scope.priceTotal-500;
                    $scope.successValue = 500;
                }
            }
        }
        $scope.adultplus = function (adultplusvalue) {
            //alert("hey");
//            if (tourID.id1 == 0) {
//            alert($scope.GUIDEid);
//            alert($scope.TOURid);
                 if ($scope.GUIDEid == 0) {
                $scope.adultValue =parseInt(adultplusvalue , 10) + 1;
                if ($scope.minTourPrice <= 2000) {
                    // alert("hi");
                    if ($scope.adultValue > 4) {
                        $scope.tourPrice = $scope.tourPrice + $scope.minTourPrice;
                        $scope.priceTotal = $scope.priceTotal + $scope.minTourPrice;
                    }

                } else {
                    $scope.tourPrice = $scope.tourPrice + $scope.minTourPrice;
                    $scope.priceTotal = $scope.priceTotal + $scope.minTourPrice;
                }
            }
            if ($scope.TOURid == 0) {
                $scope.adultValue = parseInt(adultplusvalue , 10) + 1;
                if ($scope.MinGuidePrice <= 2000) {
                    // alert("hi");
                    if ($scope.adultValue > 4) {
                        var guidepriceByPerson = $scope.MinGuidePrice * $scope.adultValue;
                        $scope.guidePrice = $scope.dayValue * guidepriceByPerson;
                        // $scope.guidePrice=$scope.guidePrice+$scope.MinGuidePrice;
                        $scope.guidePriceNew = $scope.guidePrice;
                        // $scope.priceTotal= $scope.priceTotal+$scope.MinGuidePrice;
                        $scope.priceTotal = $scope.guidePrice + $scope.transportPrice + $scope.lodgingPrice;
                    }

                } else {
                    var guidepriceByPerson = $scope.MinGuidePrice * $scope.adultValue;
                    $scope.guidePrice = $scope.dayValue * guidepriceByPerson;
                    // $scope.guidePrice=$scope.guidePrice+$scope.MinGuidePrice;
                    $scope.guidePriceNew = $scope.guidePrice;
                    // $scope.priceTotal= $scope.priceTotal+$scope.MinGuidePrice; 
                    $scope.priceTotal = $scope.guidePrice + $scope.transportPrice + $scope.lodgingPrice;
                }
            }
        }

        $scope.adultminus = function (adultminusvalue) {
            //alert("hey");
            if ($scope.GUIDEid == 0) {
                if (adultminusvalue != 1) {
                    $scope.adultValue = parseInt(adultminusvalue , 10) - 1;


                    if ($scope.minTourPrice <= 2000) {
                        // alert("hi");
                        if ($scope.adultValue >= 4) {
                            $scope.tourPrice = $scope.tourPrice - $scope.minTourPrice;
                            $scope.priceTotal = $scope.priceTotal - $scope.minTourPrice;
                        }

                    } else {
                        $scope.tourPrice = $scope.tourPrice - $scope.minTourPrice;
                        $scope.priceTotal = $scope.priceTotal - $scope.minTourPrice;
                    }
                }
            }
            if ($scope.TOURid== 0) {
                if (adultminusvalue != 1) {
                    $scope.adultValue = parseInt(adultminusvalue , 10) - 1;


                    if ($scope.MinGuidePrice <= 2000) {
                        // alert("hi");
                        if ($scope.adultValue >= 4) {
                            var guidepriceByPerson = $scope.MinGuidePrice * $scope.adultValue;
                            $scope.guidePrice = $scope.dayValue * guidepriceByPerson;

                            // $scope.guidePrice=$scope.guidePrice-$scope.MinGuidePrice;
                            $scope.guidePriceNew = $scope.guidePrice;
                            //$scope.priceTotal= $scope.priceTotal-$scope.MinGuidePrice;
                            $scope.priceTotal = $scope.guidePrice + $scope.transportPrice + $scope.lodgingPrice;
                        }

                    } else {
                        var guidepriceByPerson = $scope.MinGuidePrice * $scope.adultValue;
                        $scope.guidePrice = $scope.dayValue * guidepriceByPerson;
                        // $scope.guidePrice=$scope.guidePrice-$scope.MinGuidePrice;
                        $scope.guidePriceNew = $scope.guidePrice;
                        //$scope.priceTotal= $scope.priceTotal-$scope.MinGuidePrice; 
                        $scope.priceTotal = $scope.guidePrice + $scope.transportPrice + $scope.lodgingPrice;
                    }
                }
            }
        }
        $scope.tourdayplus = function (dayplus) {
            $scope.dayValue = parseInt(dayplus , 10) + 1;

            // $scope.guidePrice= $scope.guidePriceNew*$scope.dayValue;
            //  $scope.priceTotal= $scope.priceTotal+$scope.guidePriceNew; 
            var guidepriceByPerson = $scope.MinGuidePrice * $scope.adultValue;
            $scope.guidePrice = $scope.dayValue * guidepriceByPerson;
            $scope.priceTotal = $scope.guidePrice + $scope.transportPrice + $scope.lodgingPrice;


        }
        $scope.tourdayminus = function (dayminus) {
            if (dayminus != 1) {
                $scope.dayValue = parseInt(dayminus , 10) - 1;
                if ($scope.MinGuidePrice <= 2000) {
                    // alert("hi");
                    if ($scope.adultValue >= 4) {
                        var guidepriceByPerson = $scope.MinGuidePrice * $scope.adultValue;
                        $scope.guidePrice = $scope.dayValue * guidepriceByPerson;
                        $scope.priceTotal = $scope.guidePrice + $scope.transportPrice + $scope.lodgingPrice;
                    }

                } else {
                    var guidepriceByPerson = $scope.MinGuidePrice * $scope.adultValue;
                    $scope.guidePrice = $scope.dayValue * guidepriceByPerson;
                    $scope.priceTotal = $scope.guidePrice + $scope.transportPrice + $scope.lodgingPrice;
                }
                // $scope.guidePrice=$scope.guidePriceNew/$scope.dayValue;
                //$scope.priceTotal= $scope.priceTotal-$scope.guidePriceNew; 

            }
        }
        $scope.conformationModal = function () {
            $('#conformationModal').modal('show');
        }

        $scope.childPlus = function () {
            $scope.child = $scope.child + 1;
        }
        $scope.childMinus = function () {

            if ($scope.child > 0) {
                $scope.child = $scope.child - 1;

            }
        }




        $scope.init = function (IDa, IDb, IDc , lodgeID_db, transportID_db, promoAmount_db, no_of_person_db,tour_days_db,name_db,email_db,contact_db,date_of_tour_db) {
            $scope.GUIDEid = IDa;
            $scope.TOURid = IDb;
            $scope.TRANSPORTid = IDc;

             $scope.name = name_db;
             $scope.email = email_db;
             $scope.contact = contact_db;
            $scope.dateOfTour = date_of_tour_db;
                    

            if ($scope.GUIDEid == 2 || $scope.TOURid == 2) {

                $http.get("https://gg_admin-prod.apigee.net/guidedgateway/transports?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
                    .success(function (response) {
                        $scope.transportbookValue = 1;
                        var transbookID = $scope.TRANSPORTid;
                        var transportlistbook = response.entities;
                        for (var i = 0, len = transportlistbook.length; i < len; i++) {

                            if (transportlistbook[i].ID == transbookID) {

                                $scope.transportBook = transportlistbook[i];

                                break;


                            }
                        }

                    })
                    .error(function () {
                        $scope.data = "error in fetching data";
                    });
            }


            if ($scope.TOURid == 0) {
               
                $scope.guideValue = 1;
                $scope.tourValue = $scope.TOURid;
                $scope.guidePrice = 1000;
                $scope.MinGuidePrice = $scope.guidePrice;
   $scope.adultValue=no_of_person_db;
                
                   if (tour_days_db != 1) {
                $scope.dayValue =tour_days_db;
                if ($scope.MinGuidePrice <= 2000) {
                  
                    if (no_of_person_db >= 4) {
                       
                        var guidepriceByPerson = $scope.MinGuidePrice * $scope.adultValue;
                        $scope.guidePrice = $scope.dayValue * guidepriceByPerson;
                        $scope.priceTotal = $scope.guidePrice + $scope.lodgingPrice;
                        $scope.adultValue = no_of_person_db;
                    }

                } else {
                    var guidepriceByPerson = $scope.MinGuidePrice * $scope.adultValue;
                    $scope.guidePrice = $scope.dayValue * guidepriceByPerson;
                    $scope.priceTotal = $scope.guidePrice  + $scope.lodgingPrice;
                    $scope.adultValue = no_of_person_db;
                }
              

            }
                
                
                if ($scope.MinGuidePrice <= 2000 && no_of_person_db <= 4) {
                    $scope.guidePrice = $scope.guidePrice * 4;
                    $scope.priceTotal = $scope.priceTotal + $scope.guidePrice;
                    $scope.adultValue = no_of_person_db;
                }
                
//                 if ( no_of_person_db > 4) {
//                           $scope.guidePrice = $scope.guidePrice * no_of_person_db;
//                             $scope.adultValue = no_of_person_db;
//                     $scope.priceTotal = $scope.priceTotal + $scope.guidePrice;
//                        }closetrans
//                $scope.priceTotal = $scope.priceTotal + $scope.guidePrice;
                $http.get("https://gg_admin-prod.apigee.net/guidedgateway/guide?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe&id=" + $scope.GUIDEid)
                    .success(function (response) {
                        $scope.guide = response.entities[0];
                    })
                    .error(function () {
                        $scope.data = "error in fetching data";
                    });
            }


            if ($scope.GUIDEid == 0) {
                // alert("hi");
                $scope.tourValue = 1;
                $scope.guideValue = $scope.GUIDEid;

                $http.get("https://gg_admin-prod.apigee.net/guidedgateway/tour?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe&tourid=" + $scope.TOURid)
                    .success(function (response) {
                        $scope.tour = response.entities[0];

                        $scope.tourPrice = parseInt($scope.tour.tour_price, 10);
                        $scope.minTourPrice = $scope.tourPrice;
                        $scope.dayValue = $scope.tour.tour_duration;
                        if ($scope.minTourPrice <= 2000 && no_of_person_db <= 4) {
                            $scope.tourPrice = $scope.tourPrice * 4;
                             $scope.adultValue = no_of_person_db;
                            // $scope.minTourPrice=$scope.tourPrice;
                        }
                         if ( no_of_person_db > 4) {
                            $scope.tourPrice = $scope.tourPrice * no_of_person_db;
                             $scope.adultValue = no_of_person_db;
                            // $scope.minTourPrice=$scope.tourPrice;
                        }
                        // alert(angular.isNumber($scope.tourPrice));

                        $scope.priceTotal = $scope.priceTotal + $scope.tourPrice;

                    })
                    .error(function () {
                        $scope.data = "error in fetching data";
                    });
            }



            
            if(lodgeID_db)
                {
                          $http.get("https://gg_admin-prod.apigee.net/guidedgateway/lodgings?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
                .success(function (response) {
                    //$scope.transport =response.Transport;

                    var lodgelist = response.entities;
                    // $scope.tourfound = '';
                    for (var i = 0, len = lodgelist.length; i < len; i++) {

                        if (lodgelist[i].ID === lodgeID_db) {
                            $scope.lodgeIDnew = lodgelist[i];
                            //   alert("hi");
                            //  alert( $scope.lodgeIDnew.ID);
                            $scope.lodgevalue = $scope.lodgeIDnew.ID;
                            if ($scope.lodgingPrice == 0) {
                                $scope.lodgingPrice = $scope.lodgeIDnew.PricePerNight;
                                // alert($scope.lodgingPrice);
                                $scope.priceTotal = $scope.priceTotal + $scope.lodgingPrice;
                            }
                            break;


                        }
                    }
                })
                .error(function () {
                    $scope.data = "error in fetching data";
                });
                    
                    
                }
            
            
            
            if(transportID_db)
                {
                   
                       $http.get("https://gg_admin-prod.apigee.net/guidedgateway/transports?apikey=QIArDn9C3RCuVmnlMh53uDccAamkgZMe")
                .success(function (response) {
                    //$scope.transport =response.Transport;

                    var translist = response.entities;
                    // $scope.tourfound = '';
                    for (var i = 0, len = translist.length; i < len; i++) {

                        if (translist[i].ID == transportID_db) {
                          
                            $scope.transIDnew = translist[i];
                            //  alert("hi");
                            // alert( $scope.transIDnew.ID);
                            $scope.transvalue = $scope.transIDnew.ID;
                            if ($scope.transportPrice == 0) {
                                $scope.transportPrice = 0; //$scope.transIDnew.PriceForDay;
                                // alert($scope.transportPrice);
                                $scope.priceTotal = $scope.priceTotal + $scope.transportPrice;
                            }
                            if ($scope.transportPrice != 0) {
                                if ($scope.transportPrice != $scope.transIDnew.PriceForDay) {
                                    $scope.priceTotal = $scope.priceTotal - $scope.transportPrice; // + $scope.transIDnew.PriceForDay;
                                    $scope.transportPrice = 0; //$scope.transIDnew.PriceForDay;
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
                }
            
            
            if(promoAmount_db)
                {
                   if ($scope.successValue == 0) {
                    //$scope.priceTotal= $scope.priceTotal-500;
                    $scope.successValue = 500;
                }  
                }
            
            
//            if(no_of_person_db)
//                {
//                        if ($scope.GUIDEid == 0) {
//                           $scope.adultValue = no_of_person_db;
//                           if ($scope.minTourPrice <= 2000) {
//                                alert("hi");
//                               if ($scope.adultValue > 4) {
//                                   alert("wow");
//                                   $scope.tourPrice = $scope.tourPrice + $scope.minTourPrice;
//                                   alert( $scope.tourPrice);
//                                   $scope.priceTotal = $scope.priceTotal + $scope.minTourPrice;
//                               }
//
//                           } else {
//                               $scope.tourPrice = $scope.tourPrice + $scope.minTourPrice;
//                               $scope.priceTotal = $scope.priceTotal + $scope.minTourPrice;
//                           }
//                       }
//                       if ($scope.TOURid == 0) {
//                           $scope.adultValue = no_of_person_db;
//                           if ($scope.MinGuidePrice <= 2000) {
//                               // alert("hi");
//                               if ($scope.adultValue > 4) {
//                                   var guidepriceByPerson = $scope.MinGuidePrice * $scope.adultValue;
//                                   $scope.guidePrice = $scope.dayValue * guidepriceByPerson;
//                                   // $scope.guidePrice=$scope.guidePrice+$scope.MinGuidePrice;
//                                   $scope.guidePriceNew = $scope.guidePrice;
//                                   // $scope.priceTotal= $scope.priceTotal+$scope.MinGuidePrice;
//                                   $scope.priceTotal = $scope.guidePrice + $scope.transportPrice + $scope.lodgingPrice;
//                               }
//
//                           } else {
//                               var guidepriceByPerson = $scope.MinGuidePrice * $scope.adultValue;
//                               $scope.guidePrice = $scope.dayValue * guidepriceByPerson;
//                               // $scope.guidePrice=$scope.guidePrice+$scope.MinGuidePrice;
//                               $scope.guidePriceNew = $scope.guidePrice;
//                               // $scope.priceTotal= $scope.priceTotal+$scope.MinGuidePrice; 
//                               $scope.priceTotal = $scope.guidePrice + $scope.transportPrice + $scope.lodgingPrice;
//                           }
//                       }
//                }
            

        }



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