<?php
session_start();
// 1. Enter Database details
$db = mysqli_connect('localhost', 'patrickking25', '', 'Members');
$staffNo = $_SESSION['staffNo'];

$AWB = $_POST['awb'];

$sql = "UPDATE shipments SET staffNo = $staffNo WHERE awb = $AWB";
mysqli_query($db, $sql) or die (header('location: https://dhltwilight-patrickking25.c9users.io/IndexHTML/CaptureNewShipment.php?error=1'));

//"Bad Query:$sql"
header('location: https://dhltwilight-patrickking25.c9users.io/IndexHTML/CaptureNewShipment.php');
?>