<?php

$servername ="localhost";
$username = "root";
$password = "";
$dbname = "content-portal_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("connection failed");
}


if(isset($_POST['Signin'])){
	session_start();
$email = $_POST["email"];
$password = $_POST["password"];
$salt = "content-portal";
$password_encrypted = sha1($password.$salt);


// $sql = mysqli_query($conn, "SELECT count(*) as total from user_tbl WHERE email = '".$email."' and 
// 	password = '".$password_encrypted."'");


$sql = mysqli_query($conn, "SELECT count(*) as total from user_tbl WHERE email = '".$email."' and 
	password = '".$password_encrypted."'");

$row = mysqli_fetch_array($sql);
	

$_SESSION['email']=$email;
$_SESSION['password']=$password_encrypted;

if($row["total"] > 0){
	?>
	<script>
		alert('Login successful');
	</script>
	
	<?php
}
else{
	?>
	<script>
		alert('Login failed');
	</script>
	<?php
}

}

?>