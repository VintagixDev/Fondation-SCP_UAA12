<?php

require_once("Models/globalModel.php");

function selectAllScientists($pdo){
    try{
        $query = 'select * from scientist';

        $scpList = $pdo->prepare($query);

        $scpList->execute();

        $scp = $scpList->fetchAll();
        
        return $scp;
    }catch(PDOEXCEPTION $e){
        $message = $e->getMessage();
        die($message);
    }
}

function createScientist($pdo){
    try{
        $query = 'insert into scientist(scientistName, scientistFirstName,
        scientistDescription, scientistRank, siteID, scientistImg) values
        (:scientistName, :scientistLastName, :scientistDescription, :scientistRank,
        :siteID, :scientistImage)';

        $img = uploadImage("Scientifiques");
        var_dump($img);
        $ajouteSCP = $pdo->prepare($query);

        $ajouteSCP->execute([
            'scientistName' => $_POST["scientistName"],
            'scientistLastName' => $_POST["scientistLastName"],
            'scientistDescription' => $_POST["scientistDescription"],
            'scientistRank' => $_POST["scientistRank"],
            'siteID' => $_POST["site"],
            'scientistImage' => $img
        ]);

        return true;
    } catch(PDOEXCEPTION $e){
        $message = $e->getMessage();
        die($message);
    }
}

function deleteScientistFromID($pdo){
    try{
        
        $query = 'select scientistImg from scientist where scientistID = :scientistID';
        $scientist = $pdo->prepare($query);

        $scientist->execute([
            'scientistID' => $_GET["scientistID"]
        ]);

        $scientistInfos = $scientist->fetch();
        
        if(isset($scientistInfos->scientistImg) && $scientistInfos->scientistImg != ""){

            if(unlink("Assets/Pictures/Scientifiques/" . $scientistInfos->scientistImg)){
                echo("Assets/Pictures/Scientifiques/" . $scientistInfos->scientistImg . " successfully deleted");
            }
        }
        

        $query = 'delete from scientist where scientistID = :scientistID';
        $deleteSCP = $pdo->prepare($query);

        $deleteSCP->execute([
            'scientistID' => $_GET["scientistID"]
        ]);



    }catch(PDOEXCEPTION $e){
        die($e->getMessage());
    }
}
