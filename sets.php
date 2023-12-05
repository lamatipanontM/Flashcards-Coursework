
<?php
session_start();
if (!isset( $_SESSION["CurrentUser"])){
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
    <head>

    <title>Create Set</title>

    </head>
    <body>

    <!-- Create a form for the user to create a set -->
    <form action="addsets.php" method = "post">
            Name:<input type="text" name= "SetName"><br>
            Description:<input type="text" name= "SetDescription"><br>

    </select>
    <input type="radio" name="status" value="Public" checked> Public<br>
    <input type="radio" name="status" value="Private" checked> Private<br>

    <input type="submit" value="Confirm">
    </form>
    </body>
</html>