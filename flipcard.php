<!DOCTYPE html>
<html>
    <body>

<?php
session_start();
if (!isset($_SESSION["side"])){
    $_SESSION["side"]=1;
}
if ($_SESSION["side"]==0){
    $_SESSION["side"]=1;}
else{
    $_SESSION["side"]=0;
}

$q=$_GET["value"];
echo($q);
    //print_r($_SESSION["deck"]);

    //$deck = $_SESSION["deck"];
    //foreach ($deck as $card){
   //     echo($card[0]."-".$card[1]);
     //   echo("<br>");
    //}
   
    $card = $_SESSION["deck"][$q][$_SESSION["side"]];
    print("<h1>".$card."</h1><br>");
    ##print_r($deck[0]);
?>
<button onclick="location.href='flash.php'" type="button">back</button>

    </body>
    </html>