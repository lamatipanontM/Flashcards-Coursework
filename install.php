<?php
  $servername = 'localhost';
  $username = 'root';
  $password= '';

try {
    #create database if not already exists and connect to it
   $conn = new PDO("mysql:host=$servername", $username, $password);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql = "CREATE DATABASE IF NOT EXISTS Flashcards";
   $conn->exec($sql);
   $sql = "USE Flashcards";
   $conn->exec($sql);
   echo "DB created successfully";
#create user table
    $stmt = $conn->prepare("DROP TABLE IF EXISTS TblUsers; 
    CREATE TABLE TblUsers
    (UserID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Email VARCHAR(50) NOT NULL,
    Username VARCHAR(50) NOT NULL,
    Password VARCHAR(50) NOT NULL)");
    $stmt->execute();
    $stmt->closeCursor();

}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
$conn=Null;

?>