<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Test Page</title>


    </head>
    <body>
<div id="box">
    
    <?php
    session_start();
    //print_r($_SESSION["deck"]);

    $deck = $_SESSION["deck"];
    foreach ($deck as $card){
        echo($card[0]."-".$card[1]);
        echo("<br>");
    }
    $cardno=rand(0,2);
    $card = $_SESSION["deck"][$cardno][0];
    print($card);
    ##print_r($deck[0]);


        ?>
        
</div>



</body>


</html>

