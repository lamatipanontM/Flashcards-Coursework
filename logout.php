<?php
// Log out reset the session variable and redirects the user to the login page
session_start();
if(isset($_SESSION['CurrentUser']))
{
    unset($_SESSION['CurrentUser']);
}
header("Location: login.php");
?>