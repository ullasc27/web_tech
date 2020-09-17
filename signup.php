<?php  

$servername ="localhost";
$username = "root";
$password = "";
$dbname = "content-portal_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("connection failed");
}

if(isset($_POST['SignUp'])){

	session_start();
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$salt = "content-portal";
$password_encrypted = sha1($password.$salt);
$sql = "INSERT INTO user_tbl (name, email, password) 
VALUES ('$name', '$email', '$password_encrypted')";

$_SESSION['name']=$name;
$_SESSION['email']=$email;

if($conn->query($sql) === TRUE){
	?>
	<script>
		alert('Values have been inserted');
	</script>
	<?php
}
else{
	?>
	<script>
		alert('Values did not insert');
	</script>
	<?php
}

}

?>




















