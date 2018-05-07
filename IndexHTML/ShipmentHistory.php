<?php
session_start();
// 1. Enter Database details
$db = mysqli_connect('localhost', 'patrickking25', '', 'Members');
$staffNo = $_SESSION['staffNo'];
$sql = "SELECT * FROM shipments WHERE staffNo = $staffNo";
$result = mysqli_query($db, $sql) or die ("Bad Query:$sql");

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="/Users/PatrickKing/Documents/NCI/Year 4/Software Project/DHLTwilight_WebApp/DHLTwilight.css">
<link rel="stylesheet" href="../CSS/CSS_HomePage/DHLTwilight.css">


<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "createdRow": function ( row, data, index ) {
            if ( data[5].replace(/[\$,]/g, '') * 1 > 150000 ) {
                $('td', row).eq(5).addClass('highlight');
            }
        }
    } );
} );
</script>

<style type="text/css">
    td.highlight {
        font-weight: bold;
        color: blue;
    }
</style>

</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
    <div class="container">
      <a class="navbar-brand" href="UserLandingPage.php"><b>  DHL Twilight</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav"></ul>
        <a class="btn navbar-btn ml-2 text-white btn-secondary" href="DHLTwilight.html"><i class="fa d-inline fa-lg fa-user-circle-o"></i> Sign Out</a>
      </div>
    </div>
  </nav>
  <div class="py-5 gradient-overlay text-center bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-light">Shipment History</h1>
              <p class="text-light"> <?php echo "Full Shipment history for Twilight Courier " .$staffNo."" ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-3">
  <!--  <div class="container">-->
  <!--    <div class="row">-->
  <!--      <div class="col-md-12">-->
  <!--        <?php echo "Courier " .$staffNo." Shipment History" ?>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  </div>

<div class="table-responsive">
<table id="example" class="display" style="width:100%">
        <thead>
              <tr>
                <th>AWB Number</th>
                <th>Status</th>
                <th>Delivery Address</th>
                <th>City</th>
                <th>POD</th>
                <th>Date</th>
            </tr>
        </thead>
        
            <tbody>
                <?php
                $num = 1;
                  while($row = mysqli_fetch_assoc($result)){
                    
                  
                  // echo "<tr><td>".$num."</td>";
                  // echo "<td>".$row['staffNo']."</td>";
                  echo "<td>".$row['awb']."</td>";
                  echo "<td>".$row['status']."</td>";
                  echo "<td>".$row['address']."</td>";
                  echo "<td>".$row['city']."</td>";
                  echo "<td>".$row['pod']."</td>";
                  echo "<td>".$row['date']."</td></tr>";
                  $num++;
                  
                  }
                ?>

            </tbody>
           
        </table>
        </div>
        
      <div class="row">
        <div class="col-md-12 p-3">
          <a class="btn btn-primary w-15" href="UserLandingPage.php">
            <b>Home</b>
          </a>
        </div>
      </div>
      
  <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

        
    </body>
</html>
