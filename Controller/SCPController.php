<?php

require_once("Models/scpModel.php");
if($uri === "/scp"){

    $safe = selectAllSCPsOnClass($pdo, "Safe");
    $euclide = selectAllSCPsOnClass($pdo, "Euclide");
    $keter = selectAllSCPsOnClass($pdo, "Keter");


    $title = "Liste d'SCP";
    $template = "Views/SCP/SCP.php"; 
    require_once("Views/base.php");

} else if($uri === "/scpnew"){
    if(isset($_POST['btnEnvoi'])){
        
        $messageError = verifEmptyData();
        if(createSCP($pdo)){
            
            header('location:/scp');
        }
    }else{
        $sites = selectAllSites($pdo);
        $title = "Ajouter un SCP";
        $template = "Views/SCP/SCPaddOrEdit.php"; 
        require_once("Views/base.php");
        
    }
}