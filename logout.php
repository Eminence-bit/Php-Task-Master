<?php
// Include functions to get session_start
require_once('includes/functions.php');

// Destroy the session
session_destroy();

// Redirect to login page
header('Location: login.php');
exit;
?>