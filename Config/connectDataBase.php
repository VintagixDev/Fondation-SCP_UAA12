<?php
try{
    $strConnection = "mysql:host=localhost;dbname=SCPCorp;port:3306";
    $pdo = new PDO($strConnection, "root", "Logitech21_", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
        
} catch(PDOException $e){
    $msg = "Error PDO : ".$e -> getMessage();
    die($msg);
}