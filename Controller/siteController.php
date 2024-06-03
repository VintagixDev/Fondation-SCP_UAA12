<?php
if(isset($_GET["siteID"]) && $uri === "/site?siteID=" . $_GET["siteID"]){
    
    $site = selectSiteById($pdo);
    $title = "Fondation SCP";
    $template = "Views/Site/site.php";
    require_once("Views/base.php");
}
else if($uri === "/sitenew" || (isset($_GET["siteID"]) && $uri === "/siteUpdate?siteID=" . $_GET["siteID"])){
    if(isset($_SESSION["user"])){
        if($_SESSION["user"]->userPermission === "admin"){
            if(isset($_POST['btnEnvoi'])){
                
                $messageError = verifEmptyData();
                if((isset($_GET["siteID"]) && $uri === "/siteUpdate?siteID=" . $_GET["siteID"])){
                    updateSite($pdo);
                    header('location:/');
                }
                if(createSite($pdo)){
                    
                    header('location:/index.php');
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
