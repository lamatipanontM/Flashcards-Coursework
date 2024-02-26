<?php
//Server login
  $servername = 'localhost';
  $username = 'root';
  $password= '';

try {
    #login to server and create database if not already exists and connect to it
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
    Username VARCHAR(120) NOT NULL,
    Password VARCHAR(200) NOT NULL)");
    $stmt->execute();
    $stmt->closeCursor();
#create sets table
    $stmt2 = $conn->prepare("DROP TABLE IF EXISTS TblSets; 
    CREATE TABLE TblSets
    (SetID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    SetName VARCHAR(50) NOT NULL,
    UserID INT(6) NOT NULL,
    Public INT(0) NOT NULL DEFAULT 0,
    SetDescription VARCHAR(100) NOT NULL)");
    $stmt2->execute();
    $stmt2->closeCursor();
#create flashards table
    $stmt3 = $conn->prepare("DROP TABLE IF EXISTS TblCards; 
    CREATE TABLE TblCards
    (CardID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Term VARCHAR(50) NOT NULL,
    Definition VARCHAR(100) NOT NULL)");
    $stmt3->execute();
    $stmt3->closeCursor();

#create table which connects set and flashcards
    $stmt4 = $conn->prepare("DROP TABLE IF EXISTS TblSetContent; 
    CREATE TABLE TblSetContent
    (SetID INT(10),
    CardID INT(10),
    PRIMARY KEY(SetID, CardID))");
    $stmt4->execute();
    $stmt4->closeCursor(); 

#create table which runs the test
   $stmt7 = $conn->prepare("DROP TABLE IF EXISTS TblUserStudies; 
   CREATE TABLE TblUserStudies
   (UserID INT(6) NOT NULL,
   SetID INT(10) NOT NULL,
   Visits INT(10) DEFAULT 0,
   TimeStart DATETIME,
   TimeFinish DATETIME,
   PRIMARY KEY(UserID, SetID))");
   $stmt7->execute();
   $stmt7->closeCursor(); 

#create table which collects score
   $stmt7 = $conn->prepare("DROP TABLE IF EXISTS Tbltest; 
   CREATE TABLE Tbltests
   (UserID INT(6) NOT NULL,
   SetID INT(10) NOT NULL,
   Score INT(10) DEFAULT 0,
   Date DATETIME,
   PRIMARY KEY(UserID, SetID, Date))");
   $stmt7->execute();
   $stmt7->closeCursor(); 

#Inserting test data for users table
    $hashed_password = password_hash("password", PASSWORD_DEFAULT);
    $stmt9 = $conn->prepare("INSERT INTO TblUsers
    (UserID,Username,Email,Password)VALUES
    (NULL,'Focus.L','lamatipanont.m@oundleschool.org.uk',:pword),
    (NULL,'Liv.X','Liv.xu@gmail.com',:pword)");
    $stmt9->bindParam(':pword', $hashed_password);
    $stmt9->execute();
    $stmt9->closeCursor();
 
#Inserting test data for Sets table
    $stmt10 = $conn->prepare("INSERT INTO TblSets
    (SetID,SetName,UserID,Public,SetDescription)VALUES
    (NULL,'Primary Storage',1,1,'RAM ROM etc'),
    (NULL,'Cell Structures',1,1,'Eukaryotes')");
    $stmt10->execute();
    $stmt10->closeCursor();

#inserts flashcard data into Tblcards
    $stmt12 = $conn->prepare("INSERT INTO TblCards
    (CardID,Term,Definition)VALUES
    (NULL,'MITOCHONDRIA','PRODUCES ATP'),
    (NULL,'Vacuole','A HOLE IN PLANT CELL'),
    (NULL,'Cell wall','MADE OF CELLULOSE'),
    (NULL,'Golgi Body','PACKAGE PROTEIN'),
    (NULL,'Lysosome','CONTAINS LYSOZYMES')");
    $stmt12->execute();
    $stmt12->closeCursor();

#links the data in tblcards to their corresponding sets
    $stmt13 = $conn->prepare("INSERT INTO TblSetContent
    (SetID,CardID)VALUES
    ('2','1'),
    ('2','2'),
    ('2','3'),
    ('2','4'),
    ('2','5')");
    $stmt13->execute();
    $stmt13->closeCursor();

}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
$conn=Null;
?>