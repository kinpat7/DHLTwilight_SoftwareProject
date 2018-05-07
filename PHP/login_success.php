<?php
session_start();
if($_SESSION_is_registered[$username]){
header("location:DHLT_LoginPage.html");
}
?>

<html>
<body>
Login Successful
</body>
</html>