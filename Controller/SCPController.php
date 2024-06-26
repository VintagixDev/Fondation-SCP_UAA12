<?php

require_once("Models/scpModel.php");
if($uri === "/scp"){
    $safe = selectAllSCPsOnClass($pdo, "Safe");
    $euclide = selectAllSCPsOnClass($pdo, "Euclide");
    $keter = selectAllSCPsOnClass($pdo, "Keter");


    $title = "Liste d'SCP";
    $template = "Views/SCP/SCP.php"; 
    require_once("Views/base.php");

} else if($uri === "/scpnew" || (isset($_GET["SCPID"]) && $uri === "/SCPUpdate?SCPID=" . $_GET["SCPID"])){
    if(isset($_SESSION["user"])){
        if($_SESSION["user"]->userPermission === "admin"){
            if(isset($_POST['btnEnvoi'])){
                
                $messageError = verifEmptyData();
                if((isset($_GET["SCPID"]) && $uri === "/SCPUpdate?SCPID=" . $_GET["SCPID"])){
                    updateSCP($pdo);
                    header('location:/scp');
                
                }else if(createSCP($pdo)){
                    header('location:/scp');
                }
                
            }else{
                $sites = selectAllSites($pdo);
                $title = "Ajouter un SCP";
                $template = "Views/SCP/SCPaddOrEdit.php"; 
                require_once("Views/base.php");
                
            }
            
        } else{
            header("location:/scp");
        }
    } else{
        header("location:/scp");
    }
} else if(isset($_GET["SCPID"]) && $uri === "/scpDelete?SCPID=" . $_GET["SCPID"]){
    if(isset($_SESSION["user"])){
        if($_SESSION["user"]->userPermission === "admin"){
            deleteSCPFromID($pdo);
        }
    }
    header('location:/scp');

    
} else if(isset($_GET["SCPID"]) && $uri === "/scpView?SCPID=" . $_GET["SCPID"]){
    $scp = selectSCPFromID($pdo);
    $title = $scp->SCPMatricule;
    $template = "Views/SCP/SCPView.php";
    require_once("Views/base.php");
}
