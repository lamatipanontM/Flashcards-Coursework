<!DOCTYPE html>
<html>
    <head>

    <title>Write</title>

    </head>

<body>




<?php
session_start();
echo($_SESSION["length"]);
echo($_SESSION['cardno']);
if(isset($_POST['add'])){
 if ($_SESSION['cardno']==$_SESSION["length"]-1){
  $_SESSION['cardno']=-1;
  echo("test done");

 } 
  $_SESSION['cardno']++;
  $_SESSION["side"]=1;
}


$lenght =(count($_SESSION["deck"]) - 1);
$_SESSION["length"]=(count($_SESSION["deck"]) - 1);

$card = $_SESSION["deck"][$_SESSION['cardno']][0];

    
  print("<h1>".$card."</h1><br>");

?>

<form action ="writeprocess.php" method="POST">
    Definition:<input type="text" name="definition"><br>
        <input type="submit" value="submit">
</form>
</body>
</html>