<?php
    session_start();
    require_once('../model/usermodel.php'); // Database connection
 
    if(isset($_REQUEST['submit'])){
        $username = trim($_REQUEST['username']);
        $password = trim($_REQUEST['password']);
        $email = trim($_REQUEST['email']);
 
        if($username == null || empty($password) || empty($email)){
            echo "Null username/password/email";
        } else {
            // Query to insert new user (No bind_param used here)
            $conn = db_connect();
            $username = $conn->real_escape_string($username); // Escape special characters
            $password = $conn->real_escape_string($password); // Escape special characters
            $email = $conn->real_escape_string($email);       // Escape special characters
 
            $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
            $status = $conn->query($sql);
 
            if($status){
                header('location: ../view/login.html');
            } else {
                header('location: ../view/signup.html');
            }
            $conn->close();
        }
    } else {
        header('location: ../view/signup.html');
    }
?>
 