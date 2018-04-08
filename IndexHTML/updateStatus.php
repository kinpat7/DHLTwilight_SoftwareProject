<?php
session_start();
// 1. Enter Database details
$db = mysqli_connect('localhost', 'patrickking25', '', 'Members');

$AWB = (int)$_POST['awb'];
var_dump($AWB); //. "<br>";
//$AWB = (int)$AWB;

echo $checkpointStatus = $_POST['status'];
echo "<br>";

// $sql = "UPDATE shipments SET status = 'Not Home' WHERE awb = '1111111111'";
$sql = "UPDATE shipments SET status = '$checkpointStatus' WHERE awb = '$AWB'";
mysqli_query($db, $sql) or die (header('location: https://dhltwilight-patrickking25.c9users.io/IndexHTML/UpdateCheckpoint.php?error=1'));

// echo "awb: ".$AWB.'<br>';
// echo "cp: " .$checkpointStatus;
//echo $status;
//"Bad Query:$sql"
header('location: https://dhltwilight-patrickking25.c9users.io/IndexHTML/UpdateCheckpoint.php');
?>