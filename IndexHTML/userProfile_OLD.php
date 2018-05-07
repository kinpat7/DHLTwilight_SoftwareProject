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

    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="/Users/PatrickKing/Documents/NCI/Year 4/Software Project/DHLTwilight_WebApp/DHLTwilight.css">
        <link rel="stylesheet" href="../CSS/CSS_HomePage/DHLTwilight.css">
       
    </head>

    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
            <div class="container">
                <a class="navbar-brand" href="UserLandingPage.php"><b>DHL Twilight</b></a>
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
                                <h1 class="text-light"><?php echo $name ?></h1>
                                <p class="text-light">User Profile</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
            <div class="panel panel-info">
                <div class="panel-heading">
                  
                    <br>
                </div>
                <!--<div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="../Images/blankProfilePic.png" class="img-circle img-responsive"> </div>-->
                <div class="panel-body">
                    <div class="row">
                        

                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td><b>Address:</b></td>
                                        <td>
                                            <?php echo $address ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>City:</b></td>
                                        <td>
                                            <?php echo $city ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Phone No:</b></td>
                                        <td>
                                            <?php echo $phone ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <tr>
                                            <td><b>Email:</b></td>
                                            <td>
                                                <?php echo $username ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>DHL Dept:</b></td>
                                            <td>
                                                <?php echo $dept ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Staff No:</b></td>
                                            <td>
                                                <?php echo $staffNo ?>
                                            </td>
                                            <!--</tr>-->
                                            <!--  <td>Phone Number</td>-->
                                            <!--  <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)-->
                                            <!--  </td>-->

                                        </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        
          <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a class="btn btn-primary btn-block" href="UserLandingPage.php"><b>Home</b>
            <br> </a>
        </div>
      </div>
    </div>
  </div>
        
        <!--<div class="py-5">-->
        <!--    <div class="container">-->
        <!--        <div class="row">-->
        <!--            <div class="col-md-12 p-3">-->
        <!--                <a class="btn btn-primary" href="UserLandingPage.php"><b>&lt; Home</b></a>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <!--<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>-->
        <!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
    </body>

    </html>