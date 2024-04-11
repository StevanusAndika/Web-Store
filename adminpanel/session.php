<?php
// Check if session is not started, then start it
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
    header('location: login.php');
    exit; // Stop further execution
}
?>


