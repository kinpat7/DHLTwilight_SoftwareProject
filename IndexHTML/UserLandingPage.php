<?php
 session_start();
?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href=".css">
  <link rel="stylesheet" href="DHLTwilight_WebApp/DHLTwilight.css">
  <link rel="stylesheet" href="../CSS/CSS_HomePage/DHLTwilight.css"> </head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
    <div class="container">
      <a class="navbar-brand" href="DHLTwilight.html"><b>DHL Twilight</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav"></ul>
          <a class="btn navbar-btn ml-2 text-white btn-secondary" href="userProfile.php"><i class="fa d-inline fa-lg fa-user-circle-o"></i> Profile</a>
        <a class="btn navbar-btn ml-2 text-white btn-secondary" href="DHLTwilight.html"><i class="fa d-inline fa-lg fa-user-circle-o"></i> Sign Out</a>
      </div>
    </div>
  </nav>
  <div class="py-5 gradient-overlay" style="background-image: url(&quot;../Images/DHLbackground.png&quot;);">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-9 text-white align-self-center">
          <h1 class="display-3 mb-4"><b>Welcome to DHL Twilight</b></h1>
          <p class="lead mb-5">The Application for Twilight Couriers! &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <br> </p>
        </div>
      </div>
    </div>
  </div>
  <div class="p-5 gradient-overlay bg-primary">
    <div class="container">
      <div class="row">
        <div class="p-3 align-self-center col-md-6">
          <div class="card">
            <div class="card-block p-5 bg-light">
              <h1><span style="font-size: 30px">Get Started! &nbsp;</span></h1>
              <h3>Log New Shipments</h3>
              <hr>
              <p>Start the new delivery process and log new shipments, view the optimal route planner, update checkpoints and capture the consignee POD!</p>
              <a href="CaptureNewShipment.php" class="btn btn-dark">NEW SHIPMENT</a>
            </div>
          </div>
        </div>
        <div class="p-3 align-self-center col-md-6">
          <div class="card">
            <div class="card-block p-5">
              <h1><span style="font-size: 30px;">View Shipment History</span></h1>
              <h3>List of all completed deliveries you have made!</h3>
              <hr>
              <p>Click on the below button to view you delivery history</p>
              <a href="ShipmentHistory.php" class="btn btn-dark">SHIPMENT HISTORY</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
   <div class="bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="p-4 col-md-6">
          <h2 class="mb-4 text-secondary">DHL Express Ireland</h2>
          <p class="text-white">DHL Express (Ireland) Ltd&nbsp;
            <br>Unit 3 Elm Road Dublin Airport Logistics Park&nbsp;</p>
          <div>St. Margarets Road&nbsp;</div>
          <div>St. Margarets&nbsp;</div>
          <div>Dublin</div>
        </div>
        <div class="p-4 col-md-6">
          <h2 class="mb-4">Contact</h2>
          <p>
            <a href="tel:+353 1870 ****" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-phone"></i>+353 123456789</a>
          </p>
          <p>
            <a href="mailto:dhl.com" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-envelope-o"></i>patrick@student.ncirl.com</a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>