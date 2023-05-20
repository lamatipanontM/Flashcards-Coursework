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
#create sets table
    $stmt2 = $conn->prepare("DROP TABLE IF EXISTS TblSets; 
    CREATE TABLE TblSets
    (SetID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    SetName VARCHAR(50) NOT NULL,
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

#create flashards table
    $stmt5 = $conn->prepare("DROP TABLE IF EXISTS TblFolders; 
    CREATE TABLE TblFolders
    (FolderID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    FolderName VARCHAR(50) NOT NULL,
    FolderDescription VARCHAR(100) NOT NULL)");
    $stmt5->execute();
    $stmt5->closeCursor();

#create table which connects sets and folder
   $stmt6 = $conn->prepare("DROP TABLE IF EXISTS TblFolderContent; 
   CREATE TABLE TblFolderContent
   (FolderID INT(10),
   SetID INT(10),
   PRIMARY KEY(FolderID, SetID))");
   $stmt6->execute();
   $stmt6->closeCursor();
   
#create table which runs the test
   $stmt7 = $conn->prepare("DROP TABLE IF EXISTS TblTests; 
   CREATE TABLE TblTests
   (TestTaken INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   TestID INT(100),
   UserID INT(10),
   SetID INT(10),
   TimeStart DATETIME,
   TimeFinish DATETIME)");
   $stmt7->execute();
   $stmt7->closeCursor(); 

#Inserting test data for users table
    $stmt9 = $conn->prepare("INSERT INTO TblUsers
    (UserID,Username,Email,Password)VALUES
    (NULL,'Focus.L','lamatipanont.m@oundleschool.org.uk','123'),
    (NULL,'Liv.X','Liv.xu@gmail.com','321')");
    $stmt9->execute();
    $stmt9->closeCursor();

#Inserting test data for Folders table
    $stmt9 = $conn->prepare("INSERT INTO TblFolders
    (FolderID,FolderName,FolderDescription)VALUES
    (NULL,'Computer Science','Very fun'),
    (NULL,'Biology','LIFEE')");
    $stmt9->execute();
    $stmt9->closeCursor();

#Inserting test data for Sets table
    $stmt10 = $conn->prepare("INSERT INTO TblSets
    (SetID,SetName,SetDescription)VALUES
    (NULL,'Primary Storage','RAM ROM etc'),
    (NULL,'Cell Structures','Eukaryotes')");
    $stmt10->execute();
    $stmt10->closeCursor();

#Inserting test data for linking set and folder table
    $stmt11 = $conn->prepare("INSERT INTO Tblfoldercontent
    (FolderID,SetID)VALUES
    ('1','1'),
    ('2','2')");
    $stmt11->execute();
    $stmt11->closeCursor();


}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
$conn=Null;

?>