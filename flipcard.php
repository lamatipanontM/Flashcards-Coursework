<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" href="styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">



    </head>
    <body>
    <div id="box">
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
</div>
<button onclick="location.href='flash.php'" type="button">Flip</button>



    </body>
    </html>