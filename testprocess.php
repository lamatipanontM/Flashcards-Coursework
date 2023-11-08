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
	//print_r($_POST);
    

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
        //print_r($row);
        array_push($card,$row["term"],$row["def"]);
        array_push($_SESSION["deck"],$card);
    // echo($row["Term"]."<br>");
        //print_r($_POST); 
        //load all cards into an array $deck=array(array("bob","is his name"),array("term","definition"))
        echo("<h1>".$row["term"]."</h1>");
    
    }


}

catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null;
//print_r($deck);
//echo($deck[2][0]);
//foreach ($deck as $card){
    //echo($card[0]."<br>");
  //  echo($card[1]);
//}

?>

</div>



</body>


</html>