<?php


$uri = $_SERVER['REQUEST_URI'];
require_once("Models/scpModel.php");

if($uri === "/index" || $uri === '/'){
    $title = "Page d'accueil";
    $template = "Views/pageAccueil.php";
    require_once("Views/base.php");
} else if($uri === "/scp"){

    $scp = selectSCP($pdo);
    
    $title = "Liste d'SCP";
    $template = "Views/SCP.php"; 
    require_once("Views/base.php");
}