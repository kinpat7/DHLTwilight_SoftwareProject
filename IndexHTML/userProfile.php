<?php
session_start();
// 1. Enter Database details
$db = mysqli_connect('localhost', 'patrickking25', '', 'Members');
$staffNo = $_SESSION['staffNo'];
$sql = "SELECT * FROM Registered WHERE staffNo = $staffNo";
$result = mysqli_query($db, $sql) or die ("Bad Query:$sql");

$name = "";
$pid = "";
$sc = "";
$pod = "";
$date = "";
$time = "";
while($row = mysqli_fetch_assoc($result)){
        $name =  $row['name'];
        $address =   $row['address'];
        $city = $row['city'];
        $phone = $row['phone'];
        $username = $row['username'];
        $dept = $row['dept'];
        $staffNo = $row['staffNo'];
    }

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/Users/PatrickKing/Documents/NCI/Year 4/Software Project/DHLTwilight_WebApp/DHLTwilight.css">
  <link rel="stylesheet" href="../CSS/CSS_HomePage/DHLTwilight.css">
  <title>User Pro</title>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
    <div class="container">
      <a class="navbar-brand" href="UserLandingPage.php">
        <b> DHL Twilight</b>
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav"></ul>
        <a class="btn navbar-btn ml-2 text-white btn-secondary" href="DHLTwilight.html">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i> Sign Out</a>
      </div>
    </div>
  </nav>
  <div class="py-5 gradient-overlay text-center bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-light">User Profile</h1>
              <p class="text-light">Registration Details</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <img class="img-fluid d-block rounded-circle mx-auto" src="../Images/profileAvatar.png" width="300">
        </div>
      </div>
    </div>
  </div>
  <div class="py-4" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center"><?php echo $name ?></h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-3">
    <div class="container w-100">
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th class="w-50 text-right">
                  <span style="font-weight: normal;">Address:</span>
                </th>
                <th class="w-50"><?php echo $address ?></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-right">
                  <b>
                    <span style="font-weight: normal;">City:</span>
                  </b>
                </td>
                <td>
                  <b><?php echo $city ?></b>
                </td>
              </tr>
              <tr>
                <td class="text-right">
                  <b>
                    <span style="font-weight: normal;">Phone No.:</span>
                  </b>
                </td>
                <td>
                  <b><?php echo $phone ?></b>
                </td>
              </tr>
              <tr>
                <td class="text-right">
                  <b>
                    <span style="font-weight: normal;">Email:</span>
                  </b>
                </td>
                <td>
                  <b><?php echo $username ?></b>
                </td>
              </tr>
              <tr>
                <td class="text-right">
                  <b>
                    <span style="font-weight: normal;">DHL Department:</span>
                  </b>
                </td>
                <td>
                  <b><?php echo $dept ?></b>
                </td>
              </tr>
              <tr>
                <td class="text-right">
                  <b class="">
                    <span style="font-weight: normal;">Staff Number:</span>
                  </b>
                </td>
                <td>
                  <b><?php echo $staffNo ?></b>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 p-3">
          <a class="btn btn-primary w-100" href="UserLandingPage.php">
            <b>Home</b>
          </a>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>