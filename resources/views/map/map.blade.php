@extends('layouts.app')

@section('content')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrkDMtQUQ0rN28GeD25xeR0lqQkWGI4C0&callback=initMap&libraries=places&v=weekly"
        defer
    ></script>
    <section class="d-flex align-items-center bg-cover pt-3">
        <!-- Sidebar -->
        <div class="col-md-3" id="sidebar-wrapper" style="height: 1000px;">
            <div id="inputs" class="mb-2 clearfix">
                <form>
                    <div class="form-group">
                        <input class="form-control form-control-lg mt-1 mb-1 places-input"
                               id="pac-input1" type="text" placeholder="Choose starting point, or click on the map...">
                        <input class="form-control form-control-lg places-input"
                               id="pac-input2" type="text" placeholder="Choose destination...">
                        <button class="btn btn-link btn-collapse pl-0 text-secondary add-new-input" type="button">More
                            destination
                        </button>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary float-right"
                                onclick="getGeoCode()" type="button">
                            <i class="fas fa-map mr-1"></i>Apply
                        </button>
                    </div>
                </form>
            </div>

            <hr>
            <div id="output">

            </div>
        </div>
        <div class="col-md-9">
            <div id="map"></div>

            <input type="hidden" value="" id="weather-current">
            <input type="hidden" value="" id="weather-forecast">
            <input type="text" value="" id="weather-current-conditions">
            <input type="text" value="" id="weather-current-temperature">
        </div>
    </section>

    <script src="{{ asset('js/weather.min.js') }}"></script>
    <script>
        const plan_my_journey = [];
        const map_autocomplete = [];
        const markersArray = [];
        const origin = null;
        const destinations = [];
        var route_breakdown = [];

        const destinationIcon =
            "https://chart.googleapis.com/chart?" +
            "chst=d_map_pin_letter&chld=D|6f42c1|2a2a2a";
        const originIcon =
            "https://chart.googleapis.com/chart?" +
            "chst=d_map_pin_letter&chld=O|007bff|2a2a2a";

        const service = null;

        var new_input_count = 2;

        function initMap() {

            const bounds = new google.maps.LatLngBounds();
            const map = new google.maps.Map(document.getElementById("map"), {
                center: {lat: 6.9191155, lng: 79.8937902},
                zoom: 13,
            });

            const inputs = document.getElementsByClassName("places-input");

            for (var j = 0; j < inputs.length; j++) {
                addPlaceInput(inputs[j], map);
            }

            const geocoder = new google.maps.Geocoder();
            const directionsService = new google.maps.DirectionsService();
            const directionsDisplay = new google.maps.DirectionsRenderer();
            const service = new google.maps.DistanceMatrixService();

            plan_my_journey.push(map); //0
            plan_my_journey.push(bounds); //1
            plan_my_journey.push(geocoder); //2
            plan_my_journey.push(service); //3
            plan_my_journey.push(directionsService); //4
            plan_my_journey.push(directionsDisplay); //5

            $('.add-new-input').click(function (e) {

                new_input_count++;

                const new_input = $('.places-input').last().after('<input class="form-control form-control-lg places-input"\n' +
                    ' id="pac-input' + new_input_count + '" type="text" placeholder="Choose destination...">');

                const newEl = document.getElementById('pac-input' + new_input_count);

                addPlaceInput(newEl, plan_my_journey[0]);
            });

            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        }


        function getRoute(my_journey) {
            const directionsService = new google.maps.DirectionsService();
            const directionsRenderer = new google.maps.DirectionsRenderer();
            directionsRenderer.setMap(plan_my_journey[0]);
            calculateAndDisplayRoute(directionsService, directionsRenderer);
            return true;
        }

        function calculateAndDisplayRoute(directionsService, directionsRenderer) {
            const waypts = [];

            $('.places-input').each(function (index, element) {
                if (index == 0) {
                    origins = $(this).val();
                } else {
                    destinations.push($(this).val());
                }
                waypts.push({
                    location: $(this).val(),
                    stopover: true,
                });
            });

            const destination = destinations[destinations.length - 1];

            directionsService.route(
                {
                    origin: origins,
                    destination: destination,
                    waypoints: waypts,
                    optimizeWaypoints: true,
                    travelMode: google.maps.TravelMode.DRIVING,
                },
                (response, status) => {
                    if (status === "OK") {

                        directionsRenderer.setDirections(response);
                        const route = response.routes[0];

                        // For each route, display summary information.
                        for (let i = 0; i < route.legs.length; i++) {

                            if (i == 0 || (i == route.legs.length - 1)) {
                                continue;
                            }

                            if (i == 1) {
                                getWeather(route.legs[i].end_location.lat(), route.legs[i].end_location.lng());
                            }

                            const route_obj = {
                                'start': {
                                    'address': route.legs[i].start_address,
                                    'lat': route.legs[i].start_location.lat(),
                                    'long': route.legs[i].start_location.lng(),
                                },
                                'end': {
                                    'address': route.legs[i].end_address,
                                    'lat': route.legs[i].end_location.lat(),
                                    'long': route.legs[i].end_location.lng(),
                                },
                                'distance': {
                                    'text': route.legs[i].distance.text,
                                    'value': route.legs[i].distance.value
                                },
                                'duration': {
                                    'text': route.legs[i].duration.text,
                                    'value': route.legs[i].duration.value
                                },
                                // 'weather': getWeather(route.legs[i].end_location.lat(), route.legs[i].end_location.lng())
                            };

                            $('#output').append('<div class="card mb-2">\n' +
                                '    <div class="card-body">\n' +
                                '        <div class="row">\n' +
                                '            <div class="col-8">\n' +
                                '                <h6 class="mb-1 card-title">' + route.legs[i].start_address + '</h6>\n' +
                                '                <small>' + route.legs[i].end_address + ' | <span class="set-weather"></span></small>\n' +
                                '            </div>\n' +
                                '            <div class="col-4 text-right">\n' +
                                '                <small class="text-muted">' + route.legs[i].duration.text + '</small>\n' +
                                '                <p class="mb-1">' + route.legs[i].distance.text + '</p>\n' +
                                '                <h6 class="mb-1">Rs 250</h6>\n' +
                                '            </div>\n' +
                                '        </div>\n' +
                                '    </div>\n' +
                                '</div>');

                            route_breakdown.push([route_obj]);
                        }

                        route_breakdown.shift();
                        route_breakdown.pop();
                    } else {
                        window.alert("Directions request failed due to " + status);
                    }
                }
            );
        }

        //
        // function getRoute1(my_journey) {
        //
        //
        //     $('.places-input').each(function (index, element) {
        //         if (index == 0) {
        //             origins = $(this).val();
        //         } else {
        //             destinations.push($(this).val());
        //         }
        //     });
        //
        //     my_journey[3].getDistanceMatrix(
        //         {
        //             origins: [origins],
        //             destinations: destinations,
        //             travelMode: google.maps.TravelMode.DRIVING,
        //             unitSystem: google.maps.UnitSystem.METRIC,
        //             avoidHighways: false,
        //             avoidTolls: false,
        //         },
        //         (response, status) => {
        //             if (status !== "OK") {
        //                 alert("Error was: " + status);
        //             } else {
        //                 const originList = response.originAddresses;
        //                 const destinationList = response.destinationAddresses;
        //                 const outputDiv = document.getElementById("output");
        //                 outputDiv.innerHTML = "";
        //                 deleteMarkers(markersArray);
        //
        //                 const showGeocodedAddressOnMap = function (asDestination) {
        //                     const icon = asDestination ? destinationIcon : originIcon;
        //
        //                     return function (results, status) {
        //                         if (status === "OK") {
        //                             plan_my_journey[0].fitBounds(plan_my_journey[1].extend(results[0].geometry.location));
        //                             markersArray.push(
        //                                 new google.maps.Marker({
        //                                     map: plan_my_journey[0],
        //                                     position: results[0].geometry.location,
        //                                     icon: icon,
        //                                     draggable: true
        //                                 })
        //                             );
        //                         } else {
        //                             alert("Geocode was not successful due to: " + status);
        //                         }
        //                     };
        //                 };
        //
        //                 for (let i = 0; i < originList.length; i++) {
        //                     const results = response.rows[i].elements;
        //                     my_journey[2].geocode(
        //                         {address: originList[i]},
        //                         showGeocodedAddressOnMap(false)
        //                     );
        //
        //                     for (let j = 0; j < results.length; j++) {
        //                         my_journey[2].geocode(
        //                             {address: destinationList[j]},
        //                             showGeocodedAddressOnMap(true)
        //                         );
        //
        //
        //                         outputDiv.innerHTML +=
        //                             originList[i] +
        //                             " to " +
        //                             destinationList[j] +
        //                             ": " +
        //                             results[j].distance.text +
        //                             " in " +
        //                             results[j].duration.text +
        //                             "<br>";
        //
        //
        //                         console.log(outputDiv);
        //                     }
        //                 }
        //             }
        //         }
        //     );
        //
        // }

        function addPlaceInput(ele, map) {

            const options = {
                componentRestrictions: {country: "lk"},
                fields: ["formatted_address", "geometry", "name"],
                origin: map.getCenter(),
                strictBounds: true,
                types: ["establishment"],
            };

            const autocomplete = new google.maps.places.Autocomplete(
                ele,
                options
            );

            map_autocomplete.push(autocomplete);
        }

        function deleteMarkers(markersArray) {
            for (let i = 0; i < markersArray.length; i++) {
                markersArray[i].setMap(null);
            }
            markersArray = [];
        }

        function getGeoCode() {
            route_breakdown = [];
            if (getRoute(plan_my_journey)) {
                setTimeout(function () {
                    $('.set-weather').text($('#weather-current-conditions').val() + ' ' + $('#weather-current-temperature').val());
                }, 2000);
            }


            // $('.places-input').each(function (index, element) {
            //     plan_my_journey[2].geocode({address: $(this).val()}, (results, status) => {
            //         if (status === "OK") {
            //             $.each(results, function (index, value) {
            //                 new google.maps.Marker({
            //                     map: plan_my_journey[0],
            //                     position: value.geometry.location,
            //                 });
            //                 plan_my_journey[0].setCenter(value.geometry.location);
            //             });
            //         } else {
            //             alert(
            //                 "Geocode was not successful for the following reason: " + status
            //             );
            //         }
            //     });
            // });
        }

        function getWeather(lat, long) {
            var apiKey = "a41fc7d08cd488e9c648a3e890ef7e66"; // your api key goes here
            Weather.setApiKey(apiKey);

            var tempApiKey = Weather.getApiKey();
            // Language methods
            var langugage = "en"; // set the language to German - libraries default language is "en" (English)
            Weather.setLanguage(langugage);
            var tempLanguage = Weather.getLanguage();

            Weather.getCurrentByLatLong(lat, long, function (current) {
                $('#weather-current').val('');
                $('#weather-current-conditions').val(current.conditions());
                $('#weather-current-temperature').val(Math.round(Weather.kelvinToCelsius(current.temperature())) + ' °C');
                $('#weather-current').val('{"conditions":"' + current.conditions() + '","temperature": "' + Math.round(Weather.kelvinToCelsius(current.temperature())) + ' °C"}');
            });

            Weather.getForecastByLatLong(lat, long, function (forecast) {
                $('#weather-forecast').val('');
                $('#weather-forecast').val('{"forecast":"' + Math.round(Weather.kelvinToCelsius(forecast.low())) + ' °C"}');
            });
        }

    </script>
@endsection
