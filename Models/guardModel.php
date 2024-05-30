<?php

require_once("Models/globalModel.php");


function selectAllGuards($pdo){
    try{
        $query = 'select * from guards';

        $scpList = $pdo->prepare($query);

        $scpList->execute();

        $scp = $scpList->fetchAll();
        
        return $scp;
    }catch(PDOEXCEPTION $e){
        $message = $e->getMessage();
        die($message);
    }
}

function createGuard($pdo){
    try{
        $query = 'insert into guards(GuardFirstName, GuardName,
        GuardDescription, GuardRank, siteID, GuardImg) values
        (:GuardName, :GuardLastName, :GuardDescription, :GuardRank,
        :siteID, :GuardImage)';

        $img = uploadImage("Gardes");
        var_dump($img);
        $ajouteSCP = $pdo->prepare($query);

        $ajouteSCP->execute([
            'GuardName' => $_POST["GuardName"],
            'GuardLastName' => $_POST["GuardLastName"],
            'GuardDescription' => $_POST["GuardDescription"],
            'GuardRank' => $_POST["GuardRank"],
            'siteID' => $_POST["site"],
            'GuardImage' => $img
        ]);

        return true;
    } catch(PDOEXCEPTION $e){
        $message = $e->getMessage();
        die($message);
    }
}

function deleteGuardFromID($pdo){
    try{
        
        $query = 'select GuardImg from guards where GuardID = :GuardID';
        $scientist = $pdo->prepare($query);

        $scientist->execute([
            'GuardID' => $_GET["guardID"]
        ]);

        $GuardInfos = $scientist->fetch();
        
      
        if(unlink("Assets/Pictures/Gardes/" . $GuardInfos->GuardImg)){
            echo("Assets/Pictures/Gardes/" . $GuardInfos->GuardImg . " successfully deleted");
        }
        
        

        $query = 'delete from guards where GuardID = :GuardID';
        $deleteSCP = $pdo->prepare($query);

        $deleteSCP->execute([
            'GuardID' => $_GET["guardID"]
        ]);



    }catch(PDOEXCEPTION $e){
        die($e->getMessage());
    }
}
