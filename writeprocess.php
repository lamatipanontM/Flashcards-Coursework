<?php
session_start();
echo($_POST['definition']);

$answer = $_SESSION["deck"][$_SESSION['cardno']][1];

if($_POST['definition']==$answer){
    echo 'yay';
}
else{
    echo 'boo';
}
$_SESSION['cardno']++;

?>
<a href="write.php">continue</a>