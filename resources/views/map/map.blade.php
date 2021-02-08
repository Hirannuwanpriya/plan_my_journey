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
    <section class="d-flex align-items-center bg-cover pt-3">
        <!-- Sidebar -->
        <div class="col-md-3" id="sidebar-wrapper" style="height: 1000px;">
            <div id="inputs" class="mb-2 clearfix">
                <form>
                    <div class="form-group">
                        <input class="form-control form-control-lg mt-1 mb-1"
                               type="text" placeholder="Choose starting point, or click on the map...">
                        <input class="form-control form-control-lg"
                               type="text" placeholder="Choose destination...">
                        <button class="btn btn-link btn-collapse pl-0 text-secondary" type="button">More destination
                        </button>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary float-right" type="submit"><i class="fas fa-map mr-1"></i>Apply
                        </button>
                    </div>
                </form>
            </div>

            <hr>
            <div id="output1">
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h6 class="mb-1 card-title">No.5 Alexandra Pll, 1A, 02 Centre Rd</h6>
                                <small>Colombo 00700, Sri Lanka | Sunny</small>
                            </div>
                            <div class="col-4 text-right">
                                <small class="text-muted">13 mins</small>
                                <p class="mb-1">4.5 km</p>
                                <h6 class="mb-1">Rs 250</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h6 class="mb-1 card-title">1A, 02 Centre Rd, R. A. De Mel Mawatha</h6>
                                <small>Colombo 00300, Sri Lanka | Sunny</small>
                            </div>
                            <div class="col-4 text-right">
                                <small class="text-muted">7 mins</small>
                                <p class="mb-1">2.3 km</p>
                                <h6 class="mb-1">Rs 130</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h6 class="mb-1 card-title"> R. A. De Mel Mawatha, Liberty Plaza</h6>
                                <small>Colombo 00700, Sri Lanka | Sunny</small>
                            </div>
                            <div class="col-4 text-right">
                                <small class="text-muted">8 mins</small>
                                <p class="mb-1">2.7 km</p>
                                <h6 class="mb-1">Rs 180</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h6 class="mb-1 card-title">Liberty Plaza , No.5 Alexandra Pl</h6>
                                <small>Colombo 00700, Sri Lanka | Sunny</small>
                            </div>
                            <div class="col-4 text-right">
                                <small class="text-muted">30 mins</small>
                                <p class="mb-1">9 km</p>
                                <h6 class="mb-1">Rs 450</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="output" class="d-none"></div>
        </div>
        <div class="col-md-9">
            <div id="map"></div>
        </div>
    </section>
@endsection
