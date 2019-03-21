<?php
   $usr = $_POST['usr'];
   $psw = $_POST['psw'];
   $con = new mysqli("localhost","root","","mywt");
   $sid = 0;
   if(mysqli_connect_error()){
      die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      $sid = 0;
   }
   else{
   $SELECT ="SELECT username From register Where username = ? AND password = ?";
     $stmt = $con->prepare($SELECT);
      $stmt->bind_param("ss", $usr, $psw);
      $stmt->execute();
      $stmt->bind_result($usr);
      $stmt->store_result();
      $rnum = $stmt->num_rows;
      if($rnum==1) {
         $sid=1;
      $data = base64_encode($usr); 
      echo 'Login Successful!';
      echo '<meta http-equiv = "refresh" content = "2; url= main.html#1'.$data.'"/>';
     
   }
   else
   {
      $sid = 0;
      echo '<meta http-equiv = "refresh" content = "2; url= main.html#0"/>';
   }
}
$stmt->close();
$con->close();
?>   