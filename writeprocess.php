<?php
session_start();

echo("Your answer: ".$_POST['definition']."<br>");

$answer = $_SESSION["deck"][$_SESSION['cardno']][1];
echo("Correct answer: ".$answer);
echo("<br>");



if($_POST['definition']==$answer){
    echo 'yay';
    $_SESSION["Score"]=$_SESSION["Score"]+1;
    echo($_SESSION["Score"]);
}
else{
    echo 'boo';
    echo($_SESSION["Score"]);
}
if ($_SESSION['cardno']==$_SESSION["length"]){
    
    try{
        include_once('connection.php');
        array_map("htmlspecialchars", $_POST);

    echo("test done");


    $date=date_create()->format('Y-m-d H:i:s');
    print_r($date);

	$stmt = $conn->prepare("INSERT INTO Tbltests(UserID,SetID,Score,Date)VALUES (:userid,:setid,:score,:date)");
	$stmt->bindParam(':userid', $_SESSION["CurrentUser"]);
    $stmt->bindParam(':setid', $_POST["Sets"]);
    $stmt->bindParam(':score', $_SESSION["Score"]);
    $stmt->bindParam(':date', $date);
	$stmt->execute();
    }

    catch(PDOException $e)
{
    echo "error".$e->getMessage();
}

}

$_SESSION['cardno']++;
?>
<a href="write.php">continue</a>