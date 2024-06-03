<?php
require_once("Models/classDModel.php");

if($uri === "/classeD"){

    $classesD = selectAllClassD($pdo);
    $title = "Liste des classes D";
    $template = "Views/Personnel/classD.php";
    require_once("Views/base.php");
}else if($uri === "/newClasseD" || (isset($_GET["classDID"]) && $uri === "/classDUpdate?classDID=" . $_GET["classDID"])){
    if(isset($_SESSION["user"])){
        if($_SESSION["user"]->userPermission === "admin"){
            if(isset($_POST['btnEnvoi'])){
                
                $messageError = verifEmptyData();
                if(isset($_GET["classDID"]) && $uri === "/classDUpdate?classDID=" . $_GET["classDID"]){

                    updateClassD($pdo);
                    header('location:/classeD');
                }else if(createClassD($pdo)){
                    
                    header('location:/classeD');
                }
                
            }else{
                $sites = selectAllSites($pdo);
                $title = "Ajouter une Classe D";
                $template = "Views/Personnel/newClassD.php"; 
                require_once("Views/base.php");
                
            }
            
        } else{
            header("location:/classeD");
        }
    } else{
        header("location:/classeD");
    }
} else if(isset($_GET["classDID"]) && $uri === "/classDDelete?classDID=" . $_GET["classDID"]){
    if(isset($_SESSION["user"])){
        if($_SESSION["user"]->userPermission === "admin"){
            DeleteClassDFromID($pdo);
        }
    }
    header('location:/classeD');
}