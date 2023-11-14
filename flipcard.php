<!DOCTYPE html>
<html>
    <body>

<?php
session_start();
$q=$_GET["value"];
    //print_r($_SESSION["deck"]);

    //$deck = $_SESSION["deck"];
    //foreach ($deck as $card){
   //     echo($card[0]."-".$card[1]);
     //   echo("<br>");
    //}
   
    $card = $_SESSION["deck"][$q][1];
    print("<h1>".$card."</h1><br>");
    ##print_r($deck[0]);
?>
<button onclick="history.back()">Go Back</button>

    </body>
    </html>