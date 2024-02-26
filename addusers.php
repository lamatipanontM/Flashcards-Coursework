<?php
// add users - takes the posted value and inserts them into the user table
header('Location: users.php');
//connects to database
try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);

 //inputs the user's detail into the user table   
	$hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);//hashes password for security
	$stmt = $conn->prepare("INSERT INTO TblUsers(UserID,Email,Username,Password)VALUES (NULL,:email,:username,:password)");
	$stmt->bindParam(':email', $_POST["Email"]);
    $stmt->bindParam(':username', $_POST["Username"]);
    $stmt->bindParam(':password', $hashed_password);
	
	$stmt->execute();
	}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null;
?>