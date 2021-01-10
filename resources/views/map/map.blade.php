<!DOCTYPE html>
<html>
<head>
    <title>Distance Matrix Service</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrkDMtQUQ0rN28GeD25xeR0lqQkWGI4C0&callback=initMap&libraries=&v=weekly"
        defer
    ></script>
    <style type="text/css">
        #right-panel {
            font-family: "Roboto", "sans-serif";
            line-height: 30px;
            padding-left: 10px;
        }

        #right-panel select,
        #right-panel input {
            font-size: 15px;
        }

        #right-panel select {
            width: 100%;
        }

        #right-panel i {
            font-size: 12px;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #map {
            height: 100%;
            width: 50%;
        }

        #right-panel {
            float: right;
            width: 48%;
            padding-left: 2%;
        }

        #output {
            font-size: 11px;
        }
    </style>
    <script>
        function initMap() {
            const bounds = new google.maps.LatLngBounds();
            const markersArray = [];
            const origin1 = { lat: 55.93, lng: -3.118 };
            const origin2 = "Greenwich, England";
            const destinationA = "Stockholm, Sweden";
            const destinationB = { lat: 50.087, lng: 14.421 };
            const destinationIcon =
                "https://chart.googleapis.com/chart?" +
                "chst=d_map_pin_letter&chld=D|FF0000|000000";
            const originIcon =
                "https://chart.googleapis.com/chart?" +
                "chst=d_map_pin_letter&chld=O|FFFF00|000000";
            const map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: 55.53, lng: 9.4 },
                zoom: 10,
            });
            const geocoder = new google.maps.Geocoder();
            const service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix(
                {
                    origins: [origin1, origin2],
                    destinations: [destinationA, destinationB],
                    travelMode: google.maps.TravelMode.DRIVING,
                    unitSystem: google.maps.UnitSystem.METRIC,
                    avoidHighways: false,
                    avoidTolls: false,
                },
                (response, status) => {
                    if (status !== "OK") {
                        alert("Error was: " + status);
                    } else {
                        const originList = response.originAddresses;
                        const destinationList = response.destinationAddresses;
                        const outputDiv = document.getElementById("output");
                        outputDiv.innerHTML = "";
                        deleteMarkers(markersArray);

                        const showGeocodedAddressOnMap = function (asDestination) {
                            const icon = asDestination ? destinationIcon : originIcon;

                            return function (results, status) {
                                if (status === "OK") {
                                    map.fitBounds(bounds.extend(results[0].geometry.location));
                                    markersArray.push(
                                        new google.maps.Marker({
                                            map,
                                            position: results[0].geometry.location,
                                            icon: icon,
                                        })
                                    );
                                } else {
                                    alert("Geocode was not successful due to: " + status);
                                }
                            };
                        };

                        for (let i = 0; i < originList.length; i++) {
                            const results = response.rows[i].elements;
                            geocoder.geocode(
                                { address: originList[i] },
                                showGeocodedAddressOnMap(false)
                            );

                            for (let j = 0; j < results.length; j++) {
                                geocoder.geocode(
                                    { address: destinationList[j] },
                                    showGeocodedAddressOnMap(true)
                                );
                                outputDiv.innerHTML +=
                                    originList[i] +
                                    " to " +
                                    destinationList[j] +
                                    ": " +
                                    results[j].distance.text +
                                    " in " +
                                    results[j].duration.text +
                                    "<br>";
                            }
                        }
                    }
                }
            );
        }

        function deleteMarkers(markersArray) {
            for (let i = 0; i < markersArray.length; i++) {
                markersArray[i].setMap(null);
            }
            markersArray = [];
        }
    </script>
</head>
<body>
<div id="right-panel">
    <div id="inputs">
        <pre>
var origin1 = {lat: 55.930, lng: -3.118};
var origin2 = 'Greenwich, England';
var destinationA = 'Stockholm, Sweden';
var destinationB = {lat: 50.087, lng: 14.421};
        </pre>
    </div>
    <div>
        <strong>Results</strong>
    </div>
    <div id="output"></div>
</div>
<div id="map"></div>
</body>
</html>
