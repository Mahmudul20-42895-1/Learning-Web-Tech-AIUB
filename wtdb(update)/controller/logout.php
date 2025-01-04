<?php
    session_start();
    // Destroy session and cookie
    session_unset();
    session_destroy();
    setcookie('status', 'true', time()-10, '/');
    header('location: ../view/login.html');
?>