<?php
require_once('db.php');

// Add a new author
function addAuthor($author_name, $contact_no, $username, $password) {
    $conn = getConnection();
    $sql = "INSERT INTO authors (author_name, contact_no, username, password)
            VALUES ('$author_name', '$contact_no', '$username', '$password')";

    return $conn->query($sql);
}

// Update author information
function updateAuthor($id, $author_name, $contact_no) {
    $conn = getConnection();
    $sql = "UPDATE authors 
            SET author_name='$author_name', contact_no='$contact_no'
            WHERE id='$id'";

    return $conn->query($sql);
}

function deleteAuthor($id) {
    $conn = getConnection();
    $sql = "DELETE FROM authors WHERE id='$id'";

    return $conn->query($sql);
}

// Search authors
function searchAuthors($keyword) {
    $conn = getConnection();
    $sql = "SELECT * FROM authors 
            WHERE author_name LIKE '%$keyword%' OR username LIKE '%$keyword%'";
    
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getAuthorByUsername($username)
{
    $conn = getConnection();
    $sql = "SELECT * FROM auhtors where author_name='$username";
    $result =$conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
function getAllAuthors() {
    $conn = getConnection();
    $sql = "SELECT * FROM authors";
    $result = $conn->query($sql);

    return $result->fetch_all(MYSQLI_ASSOC);
}
?>
