<?php
/**
 * This script handles the logout process.
 * It starts by destroying the current session.
 * It then redirects the user to the login page.
 */
session_start();
session_destroy();

header("location:../log_main/login.php");

?>
