<?php
session_start();

// initializing variables
$name       = "";
$address    = "";
$city       = "";
$phone      = "";
$dept       = "";
$staffNo    = "";
$email      = "";
$username   = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'patrickking25', '', 'Members');

// REGISTER USER ----------------------------------------------------
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $dept = mysqli_real_escape_string($db, $_POST['dept']);
  $staffNo = mysqli_real_escape_string($db, $_POST['staffNo']);
  // $email = mysqli_real_escape_string($db, $_POST['email']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($phone)) { array_push($errors, "Phone Number is required"); }
  if (empty($username)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM Registered WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    // if ($user['email'] === $email) {
    //   array_push($errors, "email already exists");
    // }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO Registered (name, address, city, phone, dept, staffNo, email, username, password)
  			  VALUES('$name', '$address', '$city', '$phone', '$dept', '$staffNo', '$email', '$username', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['staff_no'] = $staffNo;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: login.php');

  }
}

//LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM Registered WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;

  	  $_SESSION['success'] = "You are now logged in";


  	  while($row = mysqli_fetch_assoc($results)){

  	    $_SESSION['staffNo'] = $row['staffNo'];
  	  }
  	 header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }

}

?>
