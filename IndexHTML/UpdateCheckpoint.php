 <?php
session_start();
// 1. Enter Database details
$db = mysqli_connect('localhost', 'patrickking25', '', 'Members');
$staffNo = $_SESSION['staffNo'];
$sql = "SELECT * FROM shipments WHERE status='With Courier' AND staffNo = $staffNo";
$sqlUpdates = "SELECT * FROM shipments WHERE status !='With Courier' AND staffNo = $staffNo";
$result = mysqli_query($db, $sql) or die ("Bad Query:$sql");
$resultUpdates = mysqli_query($db, $sqlUpdates) or die ("Bad Query:$sql");
date_default_timezone_set('Europe/Dublin');
$date = date('m/d/Y h:i:s a', time());
?>


<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../DHLTwilight.css">
  <title>Update Checkpoint</title>
  <link rel="stylesheet" href="../CSS/CSS_HomePage/DHLTwilight.css"> </head>

<body class="">
  <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
    <div class="container">
      <a class="navbar-brand" href="UserLandingPage.php"><b>DHL Twilight</b></a>
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
              <h1 class="text-light"><b>Update Checkpoint</b></h1>
              <p class="text-light">Select an AWB and the new checkpoint</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<form action="https://dhltwilight-patrickking25.c9users.io/IndexHTML/updateStatus.php" method="post">  
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-center">
          <div class="btn-group btn-group-lg">
            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><select name = 'awb'><b> SELECT AWB</b></button>
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
                
        <div class="col-md-6 text-center">
          <div class="btn-group btn-group-lg" style="">
            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><select name = 'status'><b>SELECT CHECKPOINT</b></button>
            <div class="dropdown-menu">
            <option value="Not Home">Not Home</option>
            <option value="Delivered">Delivered</option>
            <option value="" disabled selected>Select Checkpoint</option>
            </div>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!--<form action="https://dhltwilight-patrickking25.c9users.io/IndexHTML/updatePOD.php" method="post">     -->
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
            <input type="pod" name='pod' class="form-control w-100 border border-dark" placeholder="Enter Consignee Signiture Here...">
        </div>
      </div>
    </div>
  </div>
  
    <div class="p-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <input type="submit" class="btn text-center btn-primary" value="UPDATE CHECKPOINT">
          <?php if(isset($_GET['update'])){ 
            $updatedAWB = $_GET['update'];  
            echo" <p style='color:green'>POD for $updatedAWB has been updated</p>";}?>
        </div>
        
        
      </div>
    </div>
  </div>
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!--<h3 class="p-3">Shipment Status-->
          <!--  <br> </h3>-->
        </div>
      </div>
    </div>
  </div>

</form>
  
  
  
  <div class="py-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th contenteditable="true">AWB</th>
                <th>Checkpoint</th>
                <th>POD</th>
                <th>Complete</th>
              </tr>
            </thead>
            <tbody>
                <?php
                $num = 1;
                  while($row = mysqli_fetch_assoc($resultUpdates)){
                    
                  
                  echo "<tr><td>".$num."</td>";
                  echo "<td>".$row['awb']."</td>";
                  echo "<td>".$row['status']."</td>";
                  echo "<td>".$row['pod']."</td>";
                  echo "<td>".$row['transmit']."</td>";
                  $num++;
                  
                  }
                ?>
            </tbody>
            
          </table>
        </div>
      </div>
    </div>
  </div>
  
                       <div class="p-3">
                        <div class="container">
                        <iframe="container">
                        <div class="row">
                          <div class="col-md-6 text-left">
                            <a class="btn btn-primary" href="RoutePlanner.php"><b>&lt; Route Planner</b></a>
                          </div>
                          <div class="col-md-6 text-right">
                            <a class="btn btn-primary" href="POD.php"><b>Transmit &gt;</b></a>
                        </div>
                          </div>
                        </div>
                        </div>  
  

        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>