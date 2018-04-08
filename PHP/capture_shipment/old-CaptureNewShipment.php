<!DOCTYPE html>
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
  <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
    <div class="container">
      <a class="navbar-brand" href="UserLandingPage.html"><b>DHL Twilight</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#"></a>
          </li>
        </ul>
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
          <form>
            <div class="form-group"> <label for="exampleTextarea">Capture AWB</label> <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
              <a class="btn text-center btn-primary" href=""><b>CAPTURE AWB</b></a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
 <!-- -------------------------------->
 
 <?php
// 1. Enter Database details
$db = mysqli_connect('localhost', 'patrickking25', '', 'Members');

$sql = "SELECT * FROM shipments WHERE status='With Courier'";
$result = mysqli_query($db, $sql) or die ("Bad Query:$sql");

echo"<table border ='1'>";
echo"<tr>
      <td>awb</td>
      <td>status</td>
      <td>address</td>
      <td>city</td>
     </tr>";

while($row = mysqli_fetch_assoc($result)){
  echo"<tr>
      <td>{$row['awb']}</td>
      <td>{$row['status']}</td>
      <td>{$row['address']}</td>
      <td>{$row['city']}</td>
     </tr>\n";
}

echo "</table>";

?>

  
  
  
  <!--<div class="py-5">-->
  <!--  <div class="container">-->
  <!--    <div class="row">-->
  <!--      <div class="col-md-6">-->
  <!--        <table class="table">-->
  <!--          <thead>-->
  <!--            <tr>-->
  <!--              <th>#</th>-->
  <!--              <th>AWB Number</th>-->
  <!--              <th>Shipment Status-->
  <!--                <br> </th>-->
  <!--            </tr>-->
  <!--          </thead>-->
  <!--          <tbody>-->
  <!--            <tr>-->
  <!--              <td>1</td>-->
  <!--              <td>1234567890</td>-->
  <!--              <td>With Courier</td>-->
  <!--            </tr>-->
  <!--            <tr>-->
  <!--              <td>2</td>-->
  <!--              <td>0987654321</td>-->
  <!--              <td>With Courier</td>-->
  <!--            </tr>-->
  <!--            <tr>-->
  <!--              <td>3</td>-->
  <!--              <td>9865321245</td>-->
  <!--              <td>With Courier</td>-->
  <!--            </tr>-->
  <!--          </tbody>-->
  <!--        </table>-->
  <!--      </div>-->
  <!--      <div class="col-md-6">-->
  <!--        <table class="table">-->
  <!--          <thead>-->
  <!--            <tr>-->
  <!--              <th>Address</th>-->
  <!--            </tr>-->
  <!--          </thead>-->
  <!--          <tbody>-->
  <!--            <tr>-->
  <!--              <td>1 Clontarf Road, Clontarf, Dublin</td>-->
  <!--            </tr>-->
  <!--            <tr>-->
  <!--              <td>2 Swords Road, Swords, Dubin</td>-->
  <!--            </tr>-->
  <!--            <tr>-->
  <!--              <td>3 Balbriggan Street, Balbriggan, Dublin</td>-->
  <!--            </tr>-->
  <!--          </tbody>-->
  <!--        </table>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->
  <div class="py-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12" style="">
          <a class="btn btn-primary" href=""><b>SUBMIT ADDRESSES</b></a>
        </div>
      </div>
    </div>
  </div>
  <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a class="btn btn-primary btn-block" href="RoutePlanner.html"><b>PLOT ROUTE
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