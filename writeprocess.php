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
    
    echo("test done");
    header("scoring.php");
}
$_SESSION['cardno']++;
?>
<a href="write.php">continue</a>