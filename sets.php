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
        
        Folders:<select name = "Folders"><br>

        <?php
        include_once('connection.php');
        $stmt = $conn->prepare("SELECT * FROM TblFolders");
        $stmt->execute();

        while($row = $stmt ->fetch(PDO::FETCH_ASSOC))
        {
        
            echo('<option value='.$row["FolderID"].'>'.$row['FolderName'].'</option>');
        }
        ?>
    </select>
    <input type="submit" value="Confirm">
    </form>
    </body>
</html>