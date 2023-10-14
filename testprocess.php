<?php
header('Location: tests.php');
try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
	print_r($_POST);

$stmt->bindParam(':selectedset', $_POST["Set"]);
$stmt->execute();

$stmt1 = $conn->prepare("SELECT tblcards.CardID as cards FROM Tblsetcontent
INNER JOIN tblcards 
ON tblcards.CardID=tblsetcontent.CardID 
WHERE SetID=:selectedset");
$stmt1 ->execute();



while ($row = $stmt1->fetch(PDO::FETCH_ASSOC))
{
echo($row["sn"]."<br>");
}



}

catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null;
?>