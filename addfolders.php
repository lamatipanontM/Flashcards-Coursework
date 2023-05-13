<?php

header('Location: folders.php');
try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
//Adds folder details into the folder table
	$stmt = $conn->prepare("INSERT INTO TblFolders(FolderID,FolderName,FolderDescription)VALUES (NULL,:FolderName,:FolderDescription)");
	$stmt->bindParam(':FolderName', $_POST["FolderName"]);
    $stmt->bindParam(':FolderDescription', $_POST["FolderDescription"]);

	$stmt->execute();
	}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null;
?>