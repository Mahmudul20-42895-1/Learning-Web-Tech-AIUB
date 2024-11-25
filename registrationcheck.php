<?php
session_start();

if (isset($_POST['submit'])) 
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) 
    {
        echo "Username and password cannot be empty.";
    } 
    else 
    {
        $_SESSION['users'][$username] = $password;
        echo "Registration successful! <a href='Login.html'>Login now</a>";
    }
} 
else 
{
    header('location: Registration.html');
}
?>