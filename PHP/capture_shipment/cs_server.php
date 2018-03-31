<?php
session_start();

// initializing variables
$staffNo    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'patrickking25', '', 'Members');

// LOG STAFF ID TO SHIPMENT ----------------------------------------------------
if (isset($_POST['capture_shipment'])) {
  // receive all input values from the form
  $staffNo = mysqli_real_escape_string($db, $_POST['staffNo']);  

  // Finally, register user if there are no errors in the form

    $sql = "UPDATE shipments SET staffNo ='staffNo' WHERE awb=awb";
  	$_SESSION['staffNo'] = $staffNo;
  	$_SESSION['success'] = "Shipment captured";
  	//header('location: https://dhltwilight-patrickking25.c9users.io/IndexHTML/CaptureNewShipment.html');
  	
  }
//----------------------------------------------------

// //LOGIN USER
// if (isset($_POST['login_user'])) {
//   $username = mysqli_real_escape_string($db, $_POST['username']);
//   $password = mysqli_real_escape_string($db, $_POST['password']);

//   if (empty($username)) {
//   	array_push($errors, "Username is required");
//   }
//   if (empty($password)) {
//   	array_push($errors, "Password is required");
//   }

//   if (count($errors) == 0) {
//   	$password = md5($password);
//   	$query = "SELECT * FROM Registered WHERE username='$username' AND password='$password'";
//   	$results = mysqli_query($db, $query);
//   	if (mysqli_num_rows($results) == 1) {
//   	  $_SESSION['username'] = $username;
//   	  $_SESSION['success'] = "You are now logged in";
//   	  header('location: index.php');
//   	}else {
//   		array_push($errors, "Wrong username/password combination");
//   	}
//   }

}

?>