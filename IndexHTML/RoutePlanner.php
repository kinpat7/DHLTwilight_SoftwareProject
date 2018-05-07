<?php
session_start();
// 1. Enter Database details
$db = mysqli_connect('localhost', 'patrickking25', '', 'Members');
$staffNo = $_SESSION['staffNo'];
$sql = "SELECT * FROM shipments WHERE status='With Courier' AND staffNo = $staffNo";
$result = mysqli_query($db, $sql) or die ("Bad Query:$sql");
$resultmaps = mysqli_query($db, $sql) or die ("Bad Query:$sql");

?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="../DHLTwilight.css">
        <link rel="stylesheet" href="../CSS/CSS_HomePage/DHLTwilight.css">
        <link rel="stylesheet" href="../CSS/CSS_HomePage/CSS_RoutePlanner.css">
        <style>
            #right-panel {
                font-family: 'Roboto', 'sans-serif';
                line-height: 35px;
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
                float: left;
                width: 60%;
                height: 100%;
            }
            
            #right-panel {
                margin: 20px;
                border-width: 2px;
                width: 25%;
                height: 400px;
                float: left;
                text-align: left;
                padding-top: 0;
            }
            
            #directions-panel {
                margin-top: 10px;
                background-color: #f7f6d5;
                padding: 10px;
                overflow: scroll;
                height: 100px;
                /*//#FFEE77*/
            }
        </style>

    </head>

    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
            <div class="container">
                <a class="navbar-brand" href="UserLandingPage.html"><b>DHL Twilight</b></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
                    <ul class="navbar-nav"></ul>
                    <a class="btn navbar-btn ml-2 text-white btn-secondary"><i class="fa d-inline fa-lg fa-user-circle-o"></i>Sign Out</a>
                </div>
            </div>
        </nav>
        <div class="py-5 text-center bg-primary gradient-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="text-light"><b>Route Planner</b></h1>
                                <p class="text-light">Optimal Route is displayed for your deliveries</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Delivery</th>
                                    <th>AWB Number</th>
                                    <th>Status</th>
                                    <th>Address</th>
                                    <th>City</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                $num = 1;
                  while($row = mysqli_fetch_assoc($result)){

                  echo "<tr><td>".$num."</td>";
                  echo "<td>".$row['awb']."</td>";
                  echo "<td>".$row['status']."</td>";
                  echo "<td>".$row['address']."</td>";
                  echo "<td>".$row['city']."</td></tr>";
                  $num++;

                  }
                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <!--<iframe width="600" height="450" frameborder="0" style="border:0"-->
                        <!--src="https://www.google.com/maps/embed/v1/view?zoom=10&center=53.3498,-6.2603&key=AIzaSyC2aDgorzmbhYCXihJ-16R7opUvkgjec-A" allowfullscreen></iframe>-->

                        <div id="map"></div>
                        <div id="right-panel">
                            <div>
                                <b>Start:</b>
                                <select id="start">
                                    <option value="DHL Express, Dublin Airport Logistics Park, St Margarets, Dublin, Ireland">DHL Express HUB, Dublin</option>
                                </select>
                                <br>
                                <b>Waypoints:</b>
                                <br>
                                <i>(Ctrl+Click or Cmd+Click for multiple selection)</i>
                                <br>
                                <select multiple id="waypoints">
                                    <?php
                                    $nummaps = 1;
                                    while($rowmaps = mysqli_fetch_assoc($resultmaps)){
                                    echo '<option value="'.$rowmaps["address"].'">'.$rowmaps["address"].'</option>';
                                    $nummaps++;
                                      }
                                    ?>
                                </select>
                                <br>
                                <b>End:</b>
                                <select id="end">
                                    <option value="DHL Express, Dublin Airport Logistics Park, St Margarets, Dublin, Ireland">DHL Express, Dublin</option>
                                </select>
                                <br>
                                <input type="submit" id="submit">
                            </div>
                            <!--<div id="directions-panel"></div>-->
                        </div>

                        <script>
                            function initMap() {
                                var directionsService = new google.maps.DirectionsService;
                                var directionsDisplay = new google.maps.DirectionsRenderer;
                                var map = new google.maps.Map(document.getElementById('map'), {
                                    zoom: 10,
                                    center: {
                                        lat: 53.350140,
                                        lng: -6.266155
                                    }
                                });
                                directionsDisplay.setMap(map);

                                document.getElementById('submit').addEventListener('click', function() {
                                    calculateAndDisplayRoute(directionsService, directionsDisplay);
                                });
                            }

                            function calculateAndDisplayRoute(directionsService, directionsDisplay) {
                                var waypts = [];
                                var checkboxArray = document.getElementById('waypoints');
                                for (var i = 0; i < checkboxArray.length; i++) {
                                    if (checkboxArray.options[i].selected) {
                                        waypts.push({
                                            location: checkboxArray[i].value,
                                            stopover: true
                                        });
                                    }
                                }

                                directionsService.route({
                                    origin: document.getElementById('start').value,
                                    destination: document.getElementById('end').value,
                                    waypoints: waypts,
                                    optimizeWaypoints: true,
                                    travelMode: 'DRIVING'
                                }, function(response, status) {
                                    if (status === 'OK') {
                                        directionsDisplay.setDirections(response);
                                        var route = response.routes[0];
                                        var summaryPanel = document.getElementById('directions-panel');
                                        summaryPanel.innerHTML = '';
                                        // For each route, display summary information.
                                        for (var i = 0; i < route.legs.length; i++) {
                                            var routeSegment = i + 1;
                                            summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
                                                '</b><br>';
                                            summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
                                            summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
                                            summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
                                        }
                                    } else {
                                        window.alert('Directions request failed due to ' + status);
                                    }
                                });
                            }
                        </script>

                            </div>
                          </div>
                        </div>
                        </div>
                        
                         <div class="p-9">
                        <div class="container">
                        <div id="directions-panel"></div>
                          </div>
                        </div>

                       <div class="p-3">
                        <div class="container">
                        <iframe="container">
                        <div class="row">
                          <div class="col-md-6 text-left">
                            <a class="btn btn-primary" href="CaptureNewShipment.php"><b>&lt; Add More Shipments</b></a>
                          </div>
                          <div class="col-md-6 text-right">
                            <a class="btn btn-primary" href="UpdateCheckpoint.php"><b>Update Checkpoint &gt;</b></a>
                        </div>
                          </div>
                        </div>
                        </div>

                        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCneOYfS6nTlpaE-U9iJHaDKEr9kQWkX40&callback=initMap">
                        </script>
                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </body>

    </html>