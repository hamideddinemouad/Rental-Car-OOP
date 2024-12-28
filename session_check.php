<?php
session_start();
$timeout_duration = 1800; 

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    session_unset();
    session_destroy();
    header("Location: login.php?message=Session expired due to inactivity.");
    exit;
}

$_SESSION['last_activity'] = time();
?>
