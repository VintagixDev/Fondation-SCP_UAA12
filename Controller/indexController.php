<?php


$uri = $_SERVER['REQUEST_URI'];
require_once("Models/scpModel.php");
require_once("Models/scientistModel.php");
require_once("Models/siteModel.php");


if($uri === "/index.php" || $uri === '/'){
    $sites = SelectAllSites($pdo);
    $title = "Page d'accueil";
    $template = "Views/pageAccueil.php";
    require_once("Views/base.php");
} else if($uri === "/scp"){

    $scp = selectAllSCPs($pdo);
    
    $title = "Liste d'SCP";
    $template = "Views/SCP.php"; 
    require_once("Views/base.php");
} else if($uri === "/scientifiques" || $uri === "/scientifique"){

    $scientists = selectAllScientists($pdo);
    $title = "Liste des scientifiques";
    $template = "Views/Personnel/scientifiques.php";
    require_once("Views/base.php");
}