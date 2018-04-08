 <?php
session_start();
// 1. Enter Database details
$db = mysqli_connect('localhost', 'patrickking25', '', 'Members');
$staffNo = $_SESSION['staffNo'];
$sql = "SELECT * FROM shipments WHERE status='Delivered' AND pod IS NULL AND staffNo = $staffNo";
$result = mysqli_query($db, $sql) or die ("Bad Query:$sql");

?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/Users/PatrickKing/Documents/NCI/Year 4/Software Project/DHLTwilight_WebApp/DHLTwilight.css">
  <link rel="stylesheet" href="../CSS/CSS_HomePage/DHLTwilight.css"> </head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
    <div class="container">
      <a class="navbar-brand" href="UserLandingPage.html"><b>  DHL Twilight</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav"></ul>
        <a class="btn navbar-btn ml-2 text-white btn-secondary" href="DHLTwilight.html"><i class="fa d-inline fa-lg fa-user-circle-o"></i> Sign Out
          <br> </a>
      </div>
    </div>
  </nav>
  <div class="py-5 text-center bg-primary gradient-overlay">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-light"><b>Proof Of Delivery (POD)</b></h1>
              <p class="text-light">Please request the consignee to enter their signiture below as Proof of Delivery</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
 <form action="https://dhltwilight-patrickking25.c9users.io/IndexHTML/updatePOD.php" method="post">   
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="btn-group btn-group-lg">
            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><select name = 'awb'><b> Select AWB</b></button>
            <div class="dropdown-menu">
               <a class="dropdown-item" = 'awb'></a>
               <div class="dropdown-divider"></div>
               <option value="" disabled selected>Select your AWB</option>
              <?php
              while ($row = mysqli_fetch_assoc($result)){
              echo "<option value = ". $row['awb'].">". $row['awb']."</option>";
              }
         ?>
            </div>
            </select>
          </div>
        </div>
        
      <div class="row">
        <div class="col-md-12"> </div>
      </div>
    </div>
  </div>
  <div class="p-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">POD Capture</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="p-0">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <input type="pod" name='pod' class="form-control w-100 border border-dark" placeholder="Enter Consignee Signiture Here..."> </form>
        </div>
      </div>
    </div>
  </div>
  <div class="p-0">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <input type="submit" class="btn text-center btn-primary" value="UPDATE CHECKPOINT">
        </div>
      </div>
    </div>
  </div>
  </form>
  <?php if(isset($_GET['update'])){ 
 $updatedAWB = $_GET['update'];  
  echo" <p style='color:green'>POD for $updatedAWB has been updated</p>";}?>
  
  <div class="p-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 p-3">
          <a class="btn btn-primary" href="RoutePlanner.html">&lt; Route Planner</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <a class="btn btn-primary" href="UpdateCheckpoint.php">&lt; Checkpoints</a>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>