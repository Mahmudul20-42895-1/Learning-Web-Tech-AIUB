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
    elseif (isset($_SESSION['users'][$username]) && $_SESSION['users'][$username] == $password) 
    {
        $_SESSION['status'] = true;
        $_SESSION['username'] = $username;
        header('location: homepage.php');
    } 
    else 
    {
        echo "Invalid username or password. <a href='Login.html'>Try again</a>";
    }
} 
else 
{
    header('location: login.html');
}
?>