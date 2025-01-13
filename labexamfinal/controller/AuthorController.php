<?php
require_once('../model/AuthorModel.php');

if (isset($_POST['register'])) {
    $author_name = $_POST['author_name'];
    $contact_no = $_POST['contact_no'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (addAuthor($author_name, $contact_no, $username, $password)) {
        echo "Author registered successfully!";
    } else {
        echo "Failed to register author.";
    }
}

?>