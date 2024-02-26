<!-- Checks the input against the answer and collect score -->
<?php
session_start();
// Checks answer against the definition
echo("Your answer: ".$_POST['definition']."<br>");
$answer = $_SESSION["deck"][$_SESSION['cardno']][1];
echo("Correct answer: ".$answer);
echo("<br>");
// Output score and whether the answer was correct or incorrect
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
// Add information of the test into table
    $date=date_create()->format('Y-m-d H:i:s');
	$stmt = $conn->prepare("INSERT INTO Tbltests(UserID,SetID,Score,Date)VALUES (:userid,:setid,:score,:date)");
	$stmt->bindParam(':userid', $_SESSION["CurrentUser"]);
    $stmt->bindParam(':setid', $_SESSION["setid"]);
    $stmt->bindParam(':score', $_SESSION["Score"]);
    $stmt->bindParam(':date', $date);
	$stmt->execute();
// reset score
    $_SESSION["Score"]=0;
    }
    catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$_SESSION["Score"]==0;
header('Location: homepage.php');

}
$_SESSION['cardno']++;
?>
<a href="write.php">continue</a>