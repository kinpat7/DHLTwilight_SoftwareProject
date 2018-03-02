<?php
session_start();
if($_SESSION_is_registered[myusername]){
header("location:DHLT_LoginPage.html");
}
?>

<html>
<body>
Login Successful
</body>
</html>