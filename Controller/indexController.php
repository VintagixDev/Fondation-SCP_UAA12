<?php


$uri = $_SERVER['REQUEST_URI'];
require_once("Models/scientistModel.php");
require_once("Models/siteModel.php");
require_once("Models/userModel.php");
require_once("Models/scientistModel.php");
require_once("Models/guardModel.php");
require_once("Models/classDModel.php");
require_once("Models/scpModel.php");
require_once("Models/experienceModel.php");
require_once("Models/globalModel.php");



if(isset($_SESSION["user"])){
    updateSession($pdo);
}
if($uri === "/index.php" || $uri === '/'){
    $sites = SelectAllSites($pdo);
    $title = "Page d'accueil";
    $template = "Views/pageAccueil.php";
    require_once("Views/base.php");
}