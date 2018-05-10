<?php
session_start();
//echo "here";
$awb = $_POST['awb'];

if(!isset($_POST['awb'])){
header('location: https://dhltwilight-patrickking25.c9users.io/IndexHTML/POD.php?status=blank');
} 

// 1. Enter Database details
$db = mysqli_connect('localhost', 'patrickking25', '', 'Members');
$staffNo = $_SESSION['staffNo'];
$sql = "SELECT * FROM shipments WHERE staffNo = $staffNo AND awb = $awb";
$sqlTrans = "UPDATE shipments SET transmit ='Yes' WHERE awb = $awb";
$result = mysqli_query($db, $sql);
mysqli_query($db, $sqlTrans) or die ("Bad Query:$sql");

$id = "";
$pid = "";
$sc = "";
$pod = "";
$date = "";
$time = "";
while($row = mysqli_fetch_assoc($result)){
        $id =  $row['id'];
        $pid =   $row['pieceNo'];
        $sc = $row['statusCode'];
        $pod = $row['pod'];
        $date = $row['date'];
        $time = $row['time'];
    }
    
   
date_default_timezone_set('Europe/Dublin');
$date = date('Ymd');
$dateFile = date('Ymdhis_').$awb;


$myfile = fopen("testfile/$dateFile.txt", "w") or die("Unable to open file!");

$txt = "H;";
fwrite($myfile, $txt);
$txt = $date.";";
fwrite($myfile, $txt);
$txt = "PKTWILIGHT\n";
fwrite($myfile, $txt);
$txt = "D;";
fwrite($myfile, $txt);
$txt = $id.";";
fwrite($myfile, $txt);
$txt = "DUB;";
fwrite($myfile, $txt);
$txt = "GTW;";
fwrite($myfile, $txt);
$txt = $date.";";
fwrite($myfile, $txt);
$txt = $time.";";
fwrite($myfile, $txt);
$txt = "+01:00;";
fwrite($myfile, $txt);
$txt = $awb.";";
fwrite($myfile, $txt);
$txt = $pid.";";
fwrite($myfile, $txt);
$txt = $sc.";";
fwrite($myfile, $txt);
$txt = $pod.";";
fwrite($myfile, $txt);
$txt = "17S7;";
fwrite($myfile, $txt);
$txt = "A\n";
fwrite($myfile, $txt);
$txt = "T;";
fwrite($myfile, $txt);
$txt = $id."\n";
fwrite($myfile, $txt);
fclose($myfile);


// echo $myfile;

$ftp_server = "******.com";
$ftp_username = "******";
$ftp_userpass = "******";
$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);
ftp_pasv($ftp_conn, true);

$file = "testfile/$dateFile.txt";


// // upload file
if (ftp_put($ftp_conn, "in/twilight/$dateFile.txt", $file, FTP_ASCII))
  {
  echo "Successfully uploaded $file.";
  }
else
  {
  echo "Error uploading $file.";
  }

// close connection
ftp_close($ftp_conn);




header('location: https://dhltwilight-patrickking25.c9users.io/IndexHTML/POD.php?status=success');

?>

