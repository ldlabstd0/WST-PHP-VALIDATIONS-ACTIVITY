<?php
// Ends the PHP session and sends the user back to the login page
session_start();
$_SESSION = [];
session_destroy();
header('Location: login.php');
exit;
