<?php
session_start();
echo($_POST['Username']);
echo($_POST['password']);

//Connects to DB
include_once("connection.php");
array_map("htmlspecialchars", $_POST);

//Query with posted Username
$stmt = $conn->prepare("SELECT * FROM tblusers WHERE Username =:Username ;");
$stmt->bindParam(':Username', $_POST['Username']);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    $hashed= $row['Password'];
    $attempt= $_POST['password'];
    //Check password - directs to login page if incorrect
    if(password_verify($attempt,$hashed)){
        $_SESSION['name']=$row['Username'];
        if(!isset($_SESSION['backURL'])){
            $backURL= "/";
        }else{
            $backURL=$_SESSION['backURL'];
        }
        unset($_SESSION['backURL']);
        header('Location: ' . $backURL);
        echo ("loggedin");

    }else{
        echo ("password error");
        header('Location:  login.php');
    }
}
$conn=null;
?>