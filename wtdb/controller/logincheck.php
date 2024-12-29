<?php
    session_start();
    require_once('../model/db.php'); // Database connection
 
    if(isset($_REQUEST['submit'])){
        $username = trim($_REQUEST['username']);
        $password = trim($_REQUEST['password']);
 
        if($username == null || empty($password)){
            echo "Null username/password";
        } else {
            // Query to check user credentials (No bind_param used here)
            $conn = db_connect();
            $username = $conn->real_escape_string($username); // Escape special characters
            $password = $conn->real_escape_string($password); // Escape special characters
 
            $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result = $conn->query($sql);
 
            if($result && $result->num_rows > 0){
                setcookie('status', 'true', time()+3600, '/');
                $_SESSION['username'] = $username;
                header('location: ../view/home.php');
            } else {
                echo "Invalid user!";
            }
            $conn->close();
        }
    } else {
        header('location: ../view/login.html');
    }
?>