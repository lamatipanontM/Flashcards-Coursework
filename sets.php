<!-- Sets - Allow users to input set details and posted to addset -->
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
    <!-- Validates the input by ensuring that the field is not empty -->
    <script>
        function IsEmpty() {
        if (document.forms['createset'].SetName.value === "" ) {
            alert("empty");
            return false;
        }
        return true;
        }
    </script>
    </head>
    <body>
    <!-- Create a form for the user to create a set -->
    <form name='createset' action="addsets.php" method = "post">
            Name:<input type="text" name= "SetName"><br>
            Description:<input type="text" name= "SetDescription"><br>

    </select>
    <!-- selecting the status of the set -->
    <input type="radio" name="status" value="Public" checked> Public<br>
    <input type="radio" name="status" value="Private" checked> Private<br>

    <input onclick="return IsEmpty();" type="submit" value="Confirm">
    </form>
    <button onclick="history.back()">Go Back</button>
    </body>
</html>