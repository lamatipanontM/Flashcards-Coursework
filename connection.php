<!-- Connection - connects to the database -->
<?php
// Server login details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flashcards";
// Attemps to login to server with the details
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage()."<br>";
    }
    // echo connection failed
?>