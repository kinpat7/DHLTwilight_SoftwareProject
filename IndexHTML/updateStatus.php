<?php
session_start();
// 1. Enter Database details
$db = mysqli_connect('localhost', 'patrickking25', '', 'Members');
date_default_timezone_set('Europe/Dublin');
$date = date('Ymd');
$time = date('His');

// echo $date['date'];

$AWB = (int)$_POST['awb'];
$status = $_POST['status'];
$pod = $_POST['pod'];
print_r($_POST);

if(!isset($_POST['status'])){

header('location: UpdateCheckpoint.php?message=empty');
echo close();
}

echo $checkpointStatus = $_POST['status'];
echo "<br>";


// $sql = "UPDATE shipments SET status = 'Not Home' WHERE awb = '1111111111'";
$sql = "UPDATE shipments SET pod = '$pod',status = '$checkpointStatus', date ='$date', time ='$time' WHERE awb = '$AWB'";
$sqlStatusOK = "UPDATE shipments SET statusCode = 'OK' WHERE status ='Delivered'";
$sqlStatusNH = "UPDATE shipments SET statusCode = 'NH' WHERE status ='Not Home'";
mysqli_query($db, $sql);
mysqli_query($db, $sqlStatusNH);
mysqli_query($db, $sqlDate);
mysqli_query($db, $sqlStatusOK) or die (header('location: https://dhltwilight-patrickking25.c9users.io/IndexHTML/UpdateCheckpoint.php?error=1'));

// echo "awb: ".$AWB.'<br>';
// echo "cp: " .$checkpointStatus;
//echo $status;
//"Bad Query:$sql"
header('location: https://dhltwilight-patrickking25.c9users.io/IndexHTML/UpdateCheckpoint.php');

?>