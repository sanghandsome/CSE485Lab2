<?php
    function connection($host, $user, $pass, $db)
    {
       try{
           $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           return $conn;
       }
       catch(PDOException $e){
           die("Connection failed: " . $e->getMessage());
       }
    }
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "tlunews";
    $conn = connection($host, $user, $pass, $db);
?>
