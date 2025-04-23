<?php
session_start();  // Start session
session_unset();  // Unset all session variables
session_destroy();  // Destroy the session

// Redirect to login page after logout
header("Location: index.php");
exit();
?>
