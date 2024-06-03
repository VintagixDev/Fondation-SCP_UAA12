<?php

if($uri === "/experiences"){
    $experiences = SelectAllExperiences($pdo);
    $title = "Expériences";
    $template = "Views/Experiences/experiences.php";
    require_once("Views/base.php");


} elseif($uri === "/newExperience" || (isset($_GET["experienceID"]) && $uri === "/experienceUpdate?experienceID=" . $_GET["experienceID"])){
    if(isset($_SESSION["user"])){
        if($_SESSION["user"]->userPermission === "admin"){
            if(isset($_POST['btnEnvoi'])){
                
                $messageError = verifEmptyData();
                if((isset($_GET["experienceID"]) && $uri === "/experienceUpdate?experienceID=" . $_GET["experienceID"])){
                    updateExperience($pdo);
                    header('location:/experiences');
                
                }else if(createExperience($pdo)){
                    
                    header('location:/experiences');
                }
                
            }else{
                $sites = selectAllSites($pdo);
                $classesD = selectAllClassD($pdo);
                $scientists = selectAllScientists($pdo);
                $scps = selectAllSCPs($pdo);
                $guards = selectAllGuards($pdo);
                $title = "Ajouter une expérience";
                $template = "Views/Experiences/newExperience.php"; 
                require_once("Views/base.php");
            }
            
        } else{
            header("location:/experiences");
        }
    } else{
        header("location:/experiences");
    }


} else if(isset($_GET["experienceID"]) && $uri === "/experienceDelete?experienceID=" . $_GET["experienceID"]){
    if(isset($_SESSION["user"])){
        if($_SESSION["user"]->userPermission === "admin"){
            DeleteExperience($pdo);
        }
    }
    header('location:/experiences');
} elseif(isset($_GET["experienceID"]) && $uri === "/experienceView?experienceID=" . $_GET["experienceID"]){
    $experience = selectExperienceFromID($pdo);
    $classD = selectClassDFromExperience($pdo, $experience->experienceID);
    $scp = selectSCPFromExperience($pdo, $experience->experienceID);
    $scientist = selectScientistFromExperience($pdo, $experience->experienceID);
    $guard = selectGuardFromExperience($pdo, $experience->experienceID);
    $title = $experience->experienceTitre;
    $template = "Views/Experiences/experienceView.php";
    require_once("Views/base.php");

}