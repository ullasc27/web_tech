<?php
$con=mysqli_connect("localhost","root","","content-portal_db");
if(!$con){
    echo "Database is not connected.".mysqli_connect_errno();
}

?>