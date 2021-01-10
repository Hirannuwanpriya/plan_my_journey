@extends('layouts.app')

@section('content')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrkDMtQUQ0rN28GeD25xeR0lqQkWGI4C0&callback=initMap&libraries=&v=weekly"
        defer
    ></script>
    <script>
        const markersArray = [];
        const destinationIcon =
            "https://chart.googleapis.com/chart?" +
            "chst=d_map_pin_letter&chld=D|6f42c1|2a2a2a";
        const originIcon =
            "https://chart.googleapis.com/chart?" +
            "chst=d_map_pin_letter&chld=O|007bff|2a2a2a";


        const service = null;

        function initMap() {
            const bounds = new google.maps.LatLngBounds();
            const map = new google.maps.Map(document.getElementById("map"), {
                center: {lat: 6.9191155, lng: 79.8937902},
                zoom: 13,
            });
            const geocoder = new google.maps.Geocoder();
            const service = new google.maps.DistanceMatrixService();

            const origin1 = "ODEL, Colombo 07";
            const origin2 = "Liberty Plaza, Colombo 03";
            const destinationA = "One Galle Face, Colombo";
            const destinationB = "Liberty Plaza, Colombo 03";

            // const origin1 = {lat: 6.916724, lng: 79.8652142};
            // const origin2 = "Liberty Plaza, Srilanka";
            // const destinationA = "One Galle Face, Srilanka";
            // const destinationB = {lat: 6.9043637, lng: 79.8674914};


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
                                {address: originList[i]},
                                showGeocodedAddressOnMap(false)
                            );

                            for (let j = 0; j < results.length; j++) {
                                geocoder.geocode(
                                    {address: destinationList[j]},
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

        function getRoute() {


        }

        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <section class="d-flex align-items-center bg-cover" style="padding-top: 4rem !important;">
        <!-- Sidebar -->
        <div class="bg-light border-right col-md-4" id="sidebar-wrapper">
            <div id="inputs">
                <pre>
        var origin1 = {lat: 55.930, lng: -3.118};
        var origin2 = 'Greenwich, England';
        var destinationA = 'Stockholm, Sweden';
        var destinationB = {lat: 50.087, lng: 14.421};
                </pre>
                <button id="getRoute" onclick="getRoute()">getRoute</button>
            </div>
            <div>
                <strong>Results</strong>
            </div>
            <div id="output"></div>
        </div>
        <div class="col-md-8">
            <div id="map"></div>
        </div>
    </section>
@endsection
