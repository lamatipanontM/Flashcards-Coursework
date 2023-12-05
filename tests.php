<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Test Page</title>


    </head>
    <body>

    <div id="box">
    <form action="testprocess.php" method = "post">
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