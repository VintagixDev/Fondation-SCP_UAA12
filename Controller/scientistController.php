<?php

if($uri === "/scientifiques" || $uri === "/scientifique"){

    $scientists = selectAllScientists($pdo);
    $title = "Liste des scientifiques";
    $template = "Views/Personnel/scientifiques.php";
    require_once("Views/base.php");



}else if($uri === "/newScientifique" || (isset($_GET["scientistID"]) && $uri === "/scientifiqueUpdate?scientistID=" . $_GET["scientistID"])){
    if(isset($_SESSION["user"])){
        if($_SESSION["user"]->userPermission === "admin"){
            if(isset($_POST['btnEnvoi'])){
                $messageError = verifEmptyData();
                if(isset($_GET["scientistID"]) && $uri === "/scientifiqueUpdate?scientistID=" . $_GET["scientistID"]){
                    updateScientist($pdo);
                    header('location:/scientifiques');
                
                }else if(createScientist($pdo)){
                    
                    header('location:/scientifiques');
                }
                
            }else{
                $sites = selectAllSites($pdo);
                $title = "Ajouter un Scientifique";
                $template = "Views/Personnel/newScientifique.php"; 
                require_once("Views/base.php");
                
            }
            
        } else{
            header("location:/scientifiques");
        }
    } else{
        header("location:/scientifiques");
    }
} else if(isset($_GET["scientistID"]) && $uri === "/scientifiqueDelete?scientistID=" . $_GET["scientistID"]){
    if(isset($_SESSION["user"])){
        if($_SESSION["user"]->userPermission === "admin"){
            DeleteScientistFromID($pdo);
        }
    }
    header('location:/scientifiques');
}