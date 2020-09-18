<?php
include('header.php'); 
include('config/config.php');
$sql = "SELECT * FROM content";
$result = mysqli_query($con, $sql);

//Get the data
$identifiers = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($identifiers);

?> 