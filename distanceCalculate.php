<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title></title>
    <style type="text/css">
        body {
            font-family: Arial;
            font-size: 10pt;
        }
    </style>
</head>

<body>

    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
    <script type="text/javascript">
        var source, destination;
        var directionsDisplay;
        var directionsService = new google.maps.DirectionsService();

    

        google.maps.event.addDomListener(window, 'load', function(){
            var options = {
                types: ['(cities)'],
                componentRestrictions: {
                    country: "in"
                }
            };

            var input = document.getElementById('fromLocation');
            var autocomplete = new google.maps.places.Autocomplete(input, options);
            
             var input = document.getElementById('toLocation');
            var autocomplete = new google.maps.places.Autocomplete(input, options);

            new google.maps.places.SearchBox(autocomplete);
            new google.maps.places.SearchBox(document.getElementById('fromLocation'));
            new google.maps.places.SearchBox(document.getElementById('toLocation'));
            directionsDisplay = new google.maps.DirectionsRenderer({
                'draggable': false
            });
        });

        function GetRoute() {
            var mumbai = new google.maps.LatLng(18.9750, 72.8258);
            var mapOptions = {
                zoom: 7,
                center: mumbai
            };
            //map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);
            //directionsDisplay.setMap(map);
            //directionsDisplay.setPanel(document.getElementById('dvPanel'));

            //*********DIRECTIONS AND ROUTE**********************//
            source = document.getElementById("fromLocation").value;
            destination = document.getElementById("toLocation").value;

            var request = {
                origin: source,
                destination: destination,
                travelMode: google.maps.TravelMode.DRIVING
            };
            directionsService.route(request, function (response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                }
            });

            //*********DISTANCE AND DURATION**********************//
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix({
                origins: [source],
                destinations: [destination],
                travelMode: google.maps.TravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.METRIC,
                avoidHighways: false,
                avoidTolls: false
            }, function (response, status) {
                if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                    var distance = response.rows[0].elements[0].distance.text;
                    var duration = response.rows[0].elements[0].duration.text;
                    var dvDistance = document.getElementById("dvDistance");
                    dvDistance.innerHTML = "";
                    dvDistance.innerHTML += "Distance: " + distance + "<br />";
                    dvDistance.innerHTML += "Duration:" + duration;

                } else {
                    alert("Unable to find the distance via road.");
                }
            });
        }
    </script>
    <center>
        <div style="padding:200px 0px 0px 0px">
            <table border="0" cellpadding="0" cellspacing="5">
                <tr>
                    <td colspan="2">
                        Source:
                    </td>
                    <td colspan="2">
                        <input type="text" id="fromLocation" placeholder="Enter Source" autocomplete="on" value="Meerut, Uttar Pradesh, India" style="width: 400px; text-align:center" />

                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Destination:
                    </td>
                    <td colspan="2">
                        <input type="text" id="toLocation" placeholder="Enter Destination" autocomplete="on" value="Taj Mahal, Agra, Uttar Pradesh, India" style="width: 400px; text-align:center" />

                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    </td>
                    <td colspan="2">
                        <input type="button" value="Get Route" onclick="GetRoute()" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    </td>
                    <td colspan="2">
                        <br />
                        <br />
                        <div id="dvDistance"> </div>
                    </td>
                </tr>

            </table>
        </div>
    </center>
</body>

</html>