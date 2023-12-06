<?php
session_start();
echo("Your answer: ".$_POST['definition']."<br>");

$answer = $_SESSION["deck"][$_SESSION['cardno']][1];
echo("Correct answer: ".$answer);
echo("<br>");

if($_POST['definition']==$answer){
    echo 'yay';
}
else{
    echo 'boo';
}
$_SESSION['cardno']++;

?>
<a href="write.php">continue</a>