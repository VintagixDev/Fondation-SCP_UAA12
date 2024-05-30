<?php
require_once("Models/guardModel.php");

if($uri === "/garde" || $uri === "/gardes"){

    $guards = selectAllGuards($pdo);
    $title = "Liste des gardes";
    $template = "Views/Personnel/gardes.php";
    require_once("Views/base.php");
}else if($uri === "/newGarde"){
    if(isset($_SESSION["user"])){
        if($_SESSION["user"]->userPermission === "admin"){
            if(isset($_POST['btnEnvoi'])){
                
                $messageError = verifEmptyData();
                if(createGuard($pdo)){
                    
                    header('location:/gardes');
                }
                
            }else{
                $sites = selectAllSites($pdo);
                $title = "Ajouter un Garde";
                $template = "Views/Personnel/newGarde.php"; 
                require_once("Views/base.php");
                
            }
            
        } else{
            header("location:/gardes");
        }
    } else{
        header("location:/gardes");
    }
} else if(isset($_GET["guardID"]) && $uri === "/gardeDelete?guardID=" . $_GET["guardID"]){
    if(isset($_SESSION["user"])){
        if($_SESSION["user"]->userPermission === "admin"){
            DeleteGuardFromID($pdo);
        }
    }
    header('location:/gardes');
}