<?php
function db_connect(){
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'firstproject'; 
 
    $conn = new mysqli($host, $user, $pass, $dbname, 3306);
 
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>