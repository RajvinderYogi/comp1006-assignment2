<?php
// access the existing session
session_start();

if (empty($_SESSION['user_id'])) {
    header('location:sign-in.php');
    exit();
}
?>
