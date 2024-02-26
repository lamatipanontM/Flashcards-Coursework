<!-- Displays the terms and definition and post to flipcard -->
<!DOCTYPE html>
<html>
    <head>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>learn Page</title>

    <script>
  $(function() {
    $("#navigation").load("navbar.php");
    });
    </script>
    </head>
    <body>
    <div id="navigation"></div>
    <div class="row">
    <div class="col-sm-2 col"></div>

  <div class="col-sm-7 col">
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
    // set the card to display Term
    if(isset($_POST['add'])){
     if ($_SESSION['cardno']==$_SESSION["length"]){
      $_SESSION['cardno']=-1;

     } 
      $_SESSION['cardno']++;
      $_SESSION["side"]=1;
 }
    $lenght =(count($_SESSION["deck"]) - 1);
    $_SESSION["length"]=(count($_SESSION["deck"]) - 1);
   ?>
   <script>
    
    var cardno = "<?php echo $_SESSION["cardno"]; ?>";
    window.onload = function() { 
    loadPage('flipcard.php', cardno);
};    
   </script>
</div>
  </div>
  <div class="col-sm-3 colnext">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<button type="submit" name="add" value="Next Card">next</button>
</form>
  </div>
</div>
</body>

</html>

