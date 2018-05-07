<?php
session_start();
// 1. Enter Database details
$db = mysqli_connect('localhost', 'patrickking25', '', 'Members');
$staffNo = $_SESSION['staffNo'];
$sql = "SELECT * FROM shipments WHERE status='With Courier' AND staffNo = $staffNo";
$result = mysqli_query($db, $sql) or die ("Bad Query:$sql");

?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme.css" type="text/css">
  <link rel="stylesheet" href="theme.css">
  <link rel="stylesheet" href="../DHLTwilight.css">
  <link rel="stylesheet" href="../CSS/CSS_HomePage/DHLTwilight.css">
</head>

<body>
<?php include("header.php");?>
  <div class="py-5 text-center bg-primary gradient-overlay">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-light"><b>Capture New Shipment</b></h1>
              <p class="text-light">Enter the AWB of assigned shipments below &amp; click on 'Capture AWB'.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          
          
          <!--<form action="updateAWB.php" method="post">-->
          <!--  <div class="form-group"> <label for="exampleTextarea">Capture AWB</label> <textarea type="submit" class="form-control" name="awb" id="exampleTextarea" rows="3"></textarea>-->
          <!--    <a class="btn text-center btn-primary" ><b>CAPTURE AWB</b></a>-->
          <!--  </div>-->
          <!--</form>-->
          
          <form action="updateAWB.php" method="post">
            <div class="form-group"> 
            
            <label for="exampleTextarea">Capture AWB<?php if(isset($_GET['error'])){echo" <p style='color:red'>".$_GET['error']."</p>";}?></label> 
            <textarea class="form-control" name="awb" id="exampleTextarea" type="submit" rows="3"></textarea>
            <!--<a class="btn text-center btn-primary" ><b>CAPTURE AWB</b></a>-->
            <input type="submit" class="btn text-center btn-primary" value="CAPTURE AWB">
            </div>
          </form>
          
          
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>AWB Number</th>
                <th>Shipment Status</th>
                <th>Address</th>
                <th>City</th>
              </tr>
              </tr>
            </thead>
            <tbody>
              <!--<tr>-->
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
                <!--<td>1</td>-->
                <!--<td>1234567890</td>-->
                <!--<td>With Courier</td>-->
                <!--<td>erfghjk</td>-->
              <!--</tr>-->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
  <!--<div class="py-2">-->
  <!--  <div class="container">-->
  <!--    <div class="row">-->
  <!--      <div class="col-md-12" style="">-->
  <!--        <a class="btn btn-primary" href=""><b>SUBMIT ADDRESSES</b></a>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->
  <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a class="btn btn-primary btn-block" href="RoutePlanner.php"><b>PLOT ROUTE
            </b>
            <br> </a>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>