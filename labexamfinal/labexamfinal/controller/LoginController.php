<?php
require_once('../model/AuthorModel.php');
session_start();

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $author = getAuthorByUsername($username);

    if ($author && password_verify($password, $author['password'])) {
        $_SESSION['author_id'] = $author['id'];
        $_SESSION['username'] = $author['username'];
        header('Location: ../view/dashboard.php'); 
        exit();
    } else {
        echo "Invalid username or password!";
    }
}

?>