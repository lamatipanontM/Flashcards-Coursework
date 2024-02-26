<!-- Test process takes the values in the set and put them into arrays -->
    <?php
    //post value to the page depending on option
    print_r($_POST);
    if (isset($_POST["learn"])){
        header('Location: flash.php');
      } else if (isset($_POST["write"])){
        header('Location: write.php');
      }
    
    try{
        session_start();
        if(!isset($_SESSION["Score"]))
        {
            $_SESSION["Score"]=0;
         }
        include_once('connection.php');
        array_map("htmlspecialchars", $_POST);
        // Put terms and definition of a row into an array called card
        $_SESSION["deck"]=array();
        $_SESSION["setid"]=$_POST["Sets"];
        print_r($_POST);
        $stmt1 = $conn->prepare("SELECT tblcards.Term as term, tblcards.Definition as def FROM tblcards
        INNER JOIN tblsetcontent 
        ON tblcards.CardID=tblsetcontent.CardID 
        WHERE SetID =:Sets ;");
        $stmt1->bindParam(':Sets', $_POST["Sets"]);
        $stmt1 ->execute();
        while ($row = $stmt1->fetch(PDO::FETCH_ASSOC))
        {   
            // put the arrays of cards into another array
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
    // shuffle order of cards
    shuffle($_SESSION["deck"]);
   $_SESSION["cardno"]=0;
   $_SESSION["side"]=1;

    ?>