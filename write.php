<!-- Write - displays the term to the user and post their inputs to write process -->
<!DOCTYPE html>
<html>
    <head>
      <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Write</title>
    <script>
  $(function() {
    $("#navigation").load("navbar.php");
    });
    </script>
    </head>

<body>
<div id="navigation"></div>
<!-- Work out lenght and set the side of card -->
<?php
session_start();
echo($_SESSION["length"]);
echo($_SESSION['cardno']);
print_r($_SESSION["setid"]);
if(isset($_POST['add'])){
 if ($_SESSION['cardno']==$_SESSION["length"]-1){
  $_SESSION['cardno']=-1;
  echo("test done");
 } 
  $_SESSION['cardno']++;
  $_SESSION["side"]=1;
}

$lenght =(count($_SESSION["deck"]) - 1);
$_SESSION["length"]=(count($_SESSION["deck"]) - 1);

$card = $_SESSION["deck"][$_SESSION['cardno']][0];   
  print("<h1>".$card."</h1><br>");
?>
<!-- Post to writeprocess -->
<form action ="writeprocess.php" method="POST">
    Definition:<input oninput="this.value = this.value.toUpperCase()" type="text" name="definition"><br>
        <input type="submit" value="submit">
</form>
</body>
</html>