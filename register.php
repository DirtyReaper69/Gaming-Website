<?php
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$confirmpassword = $_POST['confirmpassword'];
if(strcmp($password,$confirmpassword)==0) {
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "mywt";
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
	if(mysqli_connect_error()){
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	}else {
		$SELECT ="SELECT username From register Where username = ? Limit 1";
		$INSERT ="INSERT Into register (username, password, email) values(?, ?, ?)";
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$stmt->bind_result($username);
		$stmt->store_result();
		$rnum = $stmt->num_rows;
		if($rnum==0) {
			$stmt->close();
			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("sss",$username, $password, $email);
			$stmt->execute();
			echo '<html style="background: url(background.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;"><body><div style="align-content: center;
  align-self: center;
  align-items: center;
  margin: 5% auto;
  width: 600px;
  height: 400px;
  background: rgba(0.3,0,0,0.5);
  color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);text-align: center"><font color="white" size="7" align="center">Account Registered Successfully!!!</font><br/><hr></div>
			 <meta http-equiv = "refresh" content = "7; url= main.html"/></body>';
		} else {
			echo '<html style="background: url(background.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;"><body><div style="align-content: center;
  align-self: center;
  align-items: center;
  margin: 5% auto;
  width: 600px;
  height: 400px;
  background: rgba(0.3,0,0,0.5);
  color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);text-align: center"><font color="red" size="7" align="center">Username Exists</font><br/><hr>
			</div>
			 <meta http-equiv = "refresh" content = "7; url= mylogin.html"/></body>';
		}
		$stmt->close();
		$conn->close();
	}
}
else{
	echo '<html style="background: url(background.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;"><body><div style="align-content: center;
  align-self: center;
  align-items: center;
  margin: 5% auto;
  width: 600px;
  height: 400px;
  background: rgba(0.3,0,0,0.5);
  color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);text-align: center"><font color="red" size="7" align="center">Passwords do not match</font><br/><hr>
			</div>
	 <meta http-equiv = "refresh" content = "7; url= mylogin.html"/></body>';
	die();
}
?>