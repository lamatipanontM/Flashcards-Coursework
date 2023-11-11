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
      var div = document.getElementById("page-container");

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
    <select id="page-selector" onchange="loadPage('flipcard.php', this.value)">
    <option disabled selected value> -- select an option -- </option> # forces selection from list
    <option value=1>Admins</option>
    <option value=0>Users</option>
   
  </select>

  <div id="page-container"></div>
<button onclick=>
    <?php
    session_start();
    //print_r($_SESSION["deck"]);

    //$deck = $_SESSION["deck"];
    //foreach ($deck as $card){
       // echo($card[0]."-".$card[1]);
        //echo("<br>");
    //}
    $cardno=rand(0,2);
    print_r($_SESSION);
    $card = $_SESSION["deck"][$cardno][0];
    print($card);
    ##print_r($deck[0]);


        ?>

        
</script>

</div>





</body>


</html>

