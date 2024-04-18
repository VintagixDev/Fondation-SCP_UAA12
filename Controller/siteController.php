<?php
if(isset($_GET["siteId"]) && $uri === "/site?siteId=" . $_GET["siteId"]){
    
    $site = selectSiteById($pdo);
    $title = "Fondation SCP";
    $template = "Views/Site/site.php";
    require_once("Views/base.php");
}