<?php
if(isset($_GET["siteId"]) && $uri === "/site?siteId=" . $_GET["siteId"]){
    
    $site = selectSiteById($pdo);
    $title = "Fondation SCP";
    $template = "Views/Site/site.php";
    require_once("Views/base.php");
}
else if($uri === "/sitenew"){
    if(isset($_SESSION["user"])){
        if($_SESSION["user"]->userPermission === "admin"){
            if(isset($_POST['btnEnvoi'])){
                
                $messageError = verifEmptyData();
                if(createSite($pdo)){
                    
                    header('location:/index.php');
                } else{
        
                }
                
            }else{
                $title = "Ajouter un Site";
                $template = "Views/Site/newSite.php"; 
                require_once("Views/base.php");
                
            }
            
        } else{
            header("location:/index.php");
        }
    } else{
        header("location:/index.php");
    }

} else if(isset($_GET["siteID"]) && $uri === "/siteDelete?siteID=" . $_GET["siteID"]){
    if(isset($_SESSION["user"])){
        if($_SESSION["user"]->userPermission === "admin"){
            deleteSiteFromID($pdo);
        }
    }
    header('location:/index.php');

    
} 