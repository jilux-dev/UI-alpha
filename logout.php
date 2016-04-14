<?php 
// logout.php for UI
    require("config.php"); // Fetch config.php and use it
    unset($_SESSION['user']);
    header("Location: index.php"); 
    die("Redirecting to: index.php");
?>
