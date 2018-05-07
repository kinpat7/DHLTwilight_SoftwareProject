<?php
session_start();
// 1. Enter Database details
$db = mysqli_connect('localhost', 'patrickking25', '', 'Members');
$staffNo = $_SESSION['staffNo'];


$AWB = $_POST['awb'];
$date = $POST['date'];

$sqlCheck = "SELECT staffNo WHERE awb = $AWB";
$result = mysqli_query($db, $sqlCheck);
$shipmentFree = false;
while($row = mysql_fetch_assoc($result)){
    if(!$row['staffNo'] = 0){
        $shipmentFree = true;
    }
}


if($shipmentFree){
    $sql = "UPDATE shipments SET staffNo = $staffNo WHERE awb = $AWB AND staffNo ='0'";
    mysqli_query($db, $sql) or die (header('location: https://dhltwilight-patrickking25.c9users.io/IndexHTML/CaptureNewShipment.php?error=Update Failed'));
    
    //"Bad Query:$sql"
    header('location: https://dhltwilight-patrickking25.c9users.io/IndexHTML/CaptureNewShipment.php');
}else{
    header('location: https://dhltwilight-patrickking25.c9users.io/IndexHTML/CaptureNewShipment.php?error=AWB Not Valid');
}
?>