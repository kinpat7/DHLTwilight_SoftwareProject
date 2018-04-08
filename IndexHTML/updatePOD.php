<?php
session_start();
// 1. Enter Database details
$db = mysqli_connect('localhost', 'patrickking25', '', 'Members');

$AWB = (int)$_POST['awb'];
var_dump($AWB); //. "<br>";
//$AWB = (int)$AWB;

echo $awbPOD = $_POST['pod'];
echo "<br>";

// $sql = "UPDATE shipments SET status = 'Not Home' WHERE awb = '1111111111'";
$sql = "UPDATE shipments SET pod = '$awbPOD' WHERE awb = '$AWB'";
mysqli_query($db, $sql) or die (header('location: https://dhltwilight-patrickking25.c9users.io/IndexHTML/POD.php?error=1'));

// echo "awb: ".$AWB.'<br>';
// echo "cp: " .$awbPOD;
//echo $status;
//"Bad Query:$sql"

header("location: https://dhltwilight-patrickking25.c9users.io/IndexHTML/POD.php?update=$AWB");
?>