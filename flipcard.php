<?php
session_start();
    //print_r($_SESSION["deck"]);

    //$deck = $_SESSION["deck"];
    //foreach ($deck as $card){
        echo($card[0]."-".$card[1]);
        echo("<br>");
    //}
    $cardno=rand(0,2);
    $card = $_SESSION["deck"][$cardno][1];
    print($card);
    ##print_r($deck[0]);
?>