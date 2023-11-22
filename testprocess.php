<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Test Page</title>


    </head>
    <body>
<div id="box">
    <?php
    header('Location: flash.php');
    try{
        session_start();
        include_once('connection.php');
        array_map("htmlspecialchars", $_POST);
        

        $_SESSION["deck"]=array();
        
        $stmt1 = $conn->prepare("SELECT tblcards.Term as term, tblcards.Definition as def FROM tblcards
        INNER JOIN tblsetcontent 
        ON tblcards.CardID=tblsetcontent.CardID 
        WHERE SetID =:Sets ;");
        $stmt1->bindParam(':Sets', $_POST["Sets"]);
        $stmt1 ->execute();
        while ($row = $stmt1->fetch(PDO::FETCH_ASSOC))
        {   
            $card=array();
            array_push($card,$row["term"],$row["def"]);
            array_push($_SESSION["deck"],$card);
            echo("<h1>".$row["term"]."</h1>");
        
        }


    }

    catch(PDOException $e)
    {
        echo "error".$e->getMessage();
    }
    $conn=null;
    
    shuffle($_SESSION["deck"]);
   $_SESSION["cardno"]=0;
   $_SESSION["side"]=1;
    //print_r($deck);
    //echo($deck[2][0]);
    //foreach ($deck as $card){
        //echo($card[0]."<br>");
    //  echo($card[1]);
    //}
        // echo($row["Term"]."<br>");
            //print_r($_POST); 
            //load all cards into an array $deck=array(array("bob","is his name"),array("term","definition"))
    ?>