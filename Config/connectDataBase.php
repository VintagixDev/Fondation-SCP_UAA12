<?php
try{
    $strConnection = "mysql:host=10.10.51.98;dbname=mael;port:3306";
    $pdo = new PDO($strConnection, "mael", "root", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
        
} catch(PDOException $e){
    $msg = "Error PDO : ".$e -> getMessage();
    die($msg);
}