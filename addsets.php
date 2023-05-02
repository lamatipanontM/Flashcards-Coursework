<?php

header('Location: sets.php');
try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);

	$stmt = $conn->prepare("INSERT INTO TblSets(SetID,FolderName,FolderDescription)VALUES (NULL,:FolderName,:FolderDescription)");
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

#not completed