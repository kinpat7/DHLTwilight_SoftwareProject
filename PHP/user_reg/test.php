<?php

$db = mysqli_connect('localhost', 'patrickking25', '', 'Members');


  $user_check_query = "SELECT username FROM Registered";
  $result = mysqli_query($db, $user_check_query);
  echo "<pres>";
  print_r($result);
  
  
  //$user = mysqli_fetch_assoc($result);
  while($row = mysqli_fetch_assoc($result)){
      echo $row['username']."<br>";
  }
?>