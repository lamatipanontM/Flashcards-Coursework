<!DOCTYPE html>
<html>
    <body>

<?php
session_start();
if (!isset($_SESSION["side"])){// make it on the term side
    $_SESSION["side"]=1;
}
if ($_SESSION["side"]==0){
    $_SESSION["side"]=1;}
else{
    $_SESSION["side"]=0;
}

$q=$_GET["value"];
echo($q);
   
  $card = $_SESSION["deck"][$q][$_SESSION["side"]];
    
  print("<h1>".$card."</h1><br>");
?>

<button onclick="location.href='flash.php'" type="button">Flip</button>



    </body>
    </html>