<?php ob_start();

// access the current session in order to delete it
session_start();

// remove all session variables
//session_unset();

// terminate the user's session
session_destroy();

// redirect to home or login page
header('location:sign-in.php');

ob_flush(); ?>
