<?php
session_start();
if(isset($_SESSION['CurrentUser']))
{
    unset($_SESSION['CurrentUser']);
}
header("Location: login.php");
?>