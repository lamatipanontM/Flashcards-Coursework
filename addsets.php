<?php

//header('Location: sets.php');
try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
	print_r($_POST);

//insert set detail into set table
	$stmt = $conn->prepare("INSERT INTO TblSets(SetID,SetName,SetDescription)VALUES (NULL,:SetName,:SetDescription)");
	$stmt->bindParam(':SetName', $_POST["SetName"]);
    $stmt->bindParam(':SetDescription', $_POST["SetDescription"]);
	$stmt->execute();

//find last created entry
	$stmt1 = $conn->prepare("SELECT SetID FROM TblSets WHERE SetID = LAST_INSERT_ID()");
	$stmt1->execute();
	while($row = $stmt1 ->fetch(PDO::FETCH_ASSOC))
	{

		$currentSet=$row["SetID"];
	}
	echo $currentSet;
	
//link setID with its folder
	$stmt3 = $conn->prepare("INSERT INTO TblFolderContent (FolderID,SetID)VALUES (:FolderID,:SetID)");
	$stmt3->bindParam(':FolderID', $_POST["Folders"]);
	$stmt3->bindParam(':SetID', $currentSet);
	$stmt3->execute();
	}

catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null;
?>

