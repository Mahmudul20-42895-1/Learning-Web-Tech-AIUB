<?php
session_start();
require_once('../model/db.php'); 

if (isset($_REQUEST['submit'])) {
    $email = trim($_REQUEST['email']); // 'username' refers to email here
    $password = trim($_REQUEST['password']);

    // Validate inputs
    if (empty($email) || empty($password)) {
        echo "Email or password cannot be empty.";
        exit;
    }

    // Connect to the database
    $conn = db_connect();

    if ($conn === null) {
        echo "Failed to connect to the database.";
        exit;
    }

    // Escape user inputs
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    // Check if the email exists in the database
    $sqlCheck = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = $conn->query($sqlCheck);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Directly compare the plain password
        if ($password === $user['password']) {
            // Start session and set cookie
            $_SESSION['email'] = $user['email'];
            setcookie('status', 'true', time() + 3600, '/');
            header('location: ../view/home.php');
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid email.";
    }

    // Close the connection
    $conn->close();
} else {
    header('location: ../view/login.html');
}
?>
