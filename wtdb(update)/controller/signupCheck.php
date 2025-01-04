<?php
session_start();
require_once('../model/db.php'); 

if (isset($_REQUEST['submit'])) {
    $username = trim($_REQUEST['username']);
    $password = trim($_REQUEST['password']);
    $email = trim($_REQUEST['email']);

    // Validate inputs
    if (empty($username) || empty($password) || empty($email)) {
        echo "All fields are required.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

   
    $conn = db_connect();

    if ($conn === null) {
        echo "Failed to connect to the database.";
        exit;
    }

   
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password); // Save password as plain text
    $email = $conn->real_escape_string($email);

   
    $sqlCheck = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = $conn->query($sqlCheck);

    if ($result && $result->num_rows > 0) {
        echo "Username or email already exists.";
        $conn->close();
        exit;
    }


    $sqlInsert = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    if ($conn->query($sqlInsert)) {
        echo "Signup successful!";
        header('location: ../view/login.html'); 
        exit;
    } else {
        echo "Failed to register user. Error: " . $conn->error;
    }

    
    $conn->close();
} else {
    header('location: ../view/signup.html'); 
}
?>
