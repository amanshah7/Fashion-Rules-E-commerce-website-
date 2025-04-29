<?php
// Start the session
session_start();

// Destroy the session
session_unset();  // Removes all session variables
session_destroy();  // Destroys the session

// Redirect to the login page
header("Location: ../admin_area/admin_login.php");
exit();
?>
