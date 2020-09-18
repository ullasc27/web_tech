<?php
require_once "connection.php";
session_start();
// if(isset($_SESSION['email']) && isset($_SESSION['success10'])){
//     echo "Welcome ".$_SESSION['success10'];
//     echo "<br><a href='logout.php'>Logout</a>";
    

// }else{
//     header( 'Location: login.php' ) ;
//         return;
// }

 // adding employee account
 if(isset($_POST['submit'])){
    // check available
    $stmt = $pdo->prepare("SELECT * FROM user_tbl WHERE email = :em");

    $stmt->execute(array(
        ':em' => $_POST['email']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Check0";
    if($row == true){
        echo "Email already exits/Give another one for new employee";
        echo "Check1...............................................................";
    }else{
    

        echo "Check2...................................................................";
        // // Employee table add
        $sql = "INSERT INTO user_tbl (name, email, password)
            VALUES (:name, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password']));

        echo "Check3...................................................................";

        unset($_SESSION['success']);

        $_SESSION['name'] = $_POST['name'];
        $_SESSION['logout'] = $_POST['email'];
        header( 'Location: success.php' ) ;
        return;
    }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup user acoount</title>
</head>
<body>
<h1>Sign Up For User</h1>
        <form method="post" action="signup.php">
            <table>
                <tr>    
                    <td>Name</td>
                    <td><input type="text" name="name" required></td>
                    
                </tr>
                <tr>    
                    <td>Email</td>
                    <td><input type="email" name="email" required></td>
                    
                </tr>
                <tr>    
                    <td>Password</td>
                    <td><input type="password" name="password" required></td>
                    
                </tr>
                <tr>
                <td><button name="submit">Submit</button></td>
                </tr>
                <tr>
                <td><a href="http://localhost/php-content/login.php">Back</a></td>
            
                </tr>
            </table>
        </form>        
</body>
</html>



