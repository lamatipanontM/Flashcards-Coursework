<!DOCTYPE html>
<html>
    <head>

    <title>Create Set</title>

    </head>
    <body>

        <form action="addsets.php" method = "post">
            Name:<input type="text" name= "SetName"><br>
            Description:<input type="text" name= "SetDescription"><br>
        </form>
        Folders:<select name = "Folders"><br>

    <?php
    $stmt = $conn->prepare("SELECT * FROM TblFolders");
	$stmt->execute();

    while($row = $stmt ->fetch(PDO::FETCH_ASSOC))
    {
        echo('<option value='.$row['FolderName'].'</option>');
    }
    ?>
    </select>
    <input type="submit" value="Confirm">
    </body>
</html>