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
<!-- 
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
  </script> -->


<button onclick="location.href='flash.php'" type="button">Flip</button>



    </body>
    </html>