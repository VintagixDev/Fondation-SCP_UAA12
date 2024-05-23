<?php

require_once('Models/globalModel.php');
function selectAllSCPs($pdo){
    try{
        $query = 'select * from scp';

        $scpList = $pdo->prepare($query);

        $scpList->execute();

        $scp = $scpList->fetchAll();
        
        return $scp;
    }catch(PDOEXCEPTION $e){
        $message = $e->getMessage();
        die($message);
    }
}

function selectSCPFromID($pdo){
    try{
        $query = 'select * from scp where SCPID = :id';

        $scpList = $pdo->prepare($query);

        $scpList->execute([
            'id' => $_GET["SCPID"]
        ]);

        $scp = $scpList->fetch();
        
        return $scp;
    }catch(PDOEXCEPTION $e){
        $message = $e->getMessage();
        die($message);
    }
}

function selectAllSCPsOnClass($pdo, $scpClass){
    try{
        $query = 'select * from scp where SCPClass = :scpClass';

        $scpList = $pdo->prepare($query);

        $scpList->execute([
            'scpClass' => $scpClass
        ]);

        $scp = $scpList->fetchAll();
        
        return $scp;
    }catch(PDOEXCEPTION $e){
        $message = $e->getMessage();
        die($message);
    }
}

function createSCP($pdo){
    try{
        $query = 'insert into SCP(SCPMatricule, SCPClass,
        SCPContainement, SCPDescription, siteID, SCPImage) values
        (:SCPMatricule, :SCPClass, :SCPContainment, :SCPDescription,
        :siteID, :SCPImage)';

        $img = uploadImage("SCP");

        $ajouteSCP = $pdo->prepare($query);

        $ajouteSCP->execute([
            'SCPMatricule' => $_POST["matricule"],
            'SCPClass' => $_POST["classe"],
            'SCPContainment' => $_POST["containment"],
            'SCPDescription' => $_POST["description"],
            'siteID' => $_POST["site"],
            'SCPImage' => $img
        ]);

        return true;
    } catch(PDOEXCEPTION $e){
        $message = $e->getMessage();
        die($message);
    }
}

function deleteSCPFromID($pdo){
    try{
        
        $query = 'select SCPImage from SCP where SCPID = :scpId';
        $SCP = $pdo->prepare($query);

        $SCP->execute([
            'scpId' => $_GET["SCPID"]
        ]);

        $scpInfos = $SCP->fetch();
        

        if(unlink("Assets/Pictures/SCP/" . $scpInfos->SCPImage)){
            echo("Assets/Pictures/SCP/" . $scpInfos->SCPImage . " successfully deleted");
        }
        

        $query = 'delete from SCP where SCPID = :scpId';
        $deleteSCP = $pdo->prepare($query);

        $deleteSCP->execute([
            'scpId' => $_GET["SCPID"]
        ]);



    }catch(PDOEXCEPTION $e){
        die($e->getMessage());
    }
}

