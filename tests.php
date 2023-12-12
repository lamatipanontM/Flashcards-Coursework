<?php
session_start();
if (!isset( $_SESSION["CurrentUser"])){
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>
    <head>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Test Page</title>




    <script>
  $(function() {
    $("#navigation").load("navbar.php");
    });
    </script>

    </head>
    <body>
    <div id="navigation"></div>

    <div id="box">
    <form action="testprocess.php" method = "POST">
        Set:<select name = "Sets"><br>

        <?php
        session_start();
        include_once('connection.php');
        $stmt = $conn->prepare("SELECT * FROM TblSets WHERE UserID=:user or Public=1");
        $stmt->bindParam(':user', $_SESSION["CurrentUser"]);
        $stmt->execute();

        while($row = $stmt ->fetch(PDO::FETCH_ASSOC))
        {
            echo('<option value='.$row["SetID"].'>'.$row['SetName'].'</option>');
        }
        ?>

        </select>
        <input type="submit"  id="learn" name="learn" value="Learn">
        <input type="submit" id="write" name="write" value="Write">
    </form>
        
    </div>



    </body>


</html>