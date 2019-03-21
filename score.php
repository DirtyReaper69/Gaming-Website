<?php
  $usr=$_COOKIE['Username'];
  $score=$_COOKIE['Score'];
  $usr2=base64_decode($usr);
  $score2=base64_decode($score);
  $con = new mysqli("localhost","root","","mywt");

   if(mysqli_connect_error()){
      die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      
   }
   else{
   $SELECT = "INSERT INTO scoreregister(username, score) VALUES (? , ?)";
   $stmt=$con->prepare($SELECT);
    $stmt->bind_param("si", $usr2, $score2);
    $stmt->execute();
      
      echo 'GAME OVER Score: '; echo $score2;
      echo '<meta http-equiv = "refresh" content = "5; url= main.html#1'.$usr.'"/>';
     
   }
$stmt->close();
$con->close();
?>   