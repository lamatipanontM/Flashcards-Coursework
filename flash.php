<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Test Page</title>


    </head>
    <body>
<div id="box">
<script>
    function loadPage(page, value) {
      // Get the div element where the page will be loaded.
      var div = document.getElementById("box");

      // Create a new XMLHttpRequest object.
      var xhr = new XMLHttpRequest();

      // Open a GET request to the selected page, passing the value as a query parameter.
      xhr.open("GET", page + "?value=" + value);

      // Set the callback function to be executed when the request is completed.
      xhr.onload = function() {
        // If the request was successful, set the content of the div element to the response.
        if (xhr.status === 200) {
          div.innerHTML = xhr.responseText;
        } else {
          // If the request was not successful, show an error message.
          div.innerHTML = "Error: " + xhr.statusText;
        }
      };
      // Send the request.
      xhr.send();
    }
  </script>


    <?php
    session_start();
    if(isset($_POST['add'])){
     if ($_SESSION['cardno']==$_SESSION["length"]){
      $_SESSION['cardno']=-1;

     } 
      $_SESSION['cardno']++;
      $_SESSION["side"]=1;
 }

    #$s=$_GET["value"];
    #echo($s);

    $lenght =(count($_SESSION["deck"]) - 1);
    $_SESSION["length"]=(count($_SESSION["deck"]) - 1);

    #function randomGen($min, $max, $quantity) {//random number gen (non repeat)
    #  $numbers = range($min, $max);
    #  shuffle($numbers);
      
  
    #  return array_slice($numbers, 0, $quantity);
  #}
  
    #$cardno= (randomGen(0,$lenght,1)); //actual generate

    #$randomcard = intval($cardno); //conversion from array to number
    #$card = $_SESSION["deck"][$randomcard]; // select the set??
   # $_SESSION["side"]=0;

   ?>
   
   <script>
    
    var cardno = "<?php echo $_SESSION["cardno"]; ?>";
    
    window.onload = function() {
      
    loadPage('flipcard.php', cardno);
};
   

    
   </script>
   

    
</div>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" type="button">
<input type="submit" name="add" value="Next Card" />
</form>





</body>


</html>

