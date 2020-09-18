<?php
require_once "connection.php";
session_start();
//log in check and validate
if(isset($_POST['login'])){
        // User validate for log in....................
        $stmt = $pdo->prepare("SELECT * FROM user_tbl WHERE email = :em and password = :typ");
        
        $stmt->execute(array(
            ':em' => $_POST['email'],
            ':typ' =>  $_POST['password']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "Test1";

        if($row == true){
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'] ;
            header( 'Location: tinyportal.php' ) ;
            return;
            echo "Test2";
        }
        else{
            echo "Wrong email or password/fill up all fields correctly";

        }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn Content Portal</title>
</head>
<body>
<h1>Log in page</h1>
        <form method="post" action="login.php">
            <table>
            
                <tr>    
                    <td>Email</td>
                    <td><input type="email" name="email" required></td>
                    
                </tr>
                <tr>    
                    <td>Password</td>
                    <td><input type="password" name="password" required></td>
                    
                </tr>
                <tr>   
                    <td><input type="submit" name="login" value="Login"></td>
                    
                </tr>
                <!-- hidden input for authentication-->
                <tr>
                    <td><input type="hidden" name="id" value="<?= $row['id'] ?>"></td>
                </tr>
            </table>
        </form>
        
</body>
</html>