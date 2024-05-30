<?php

require_once("Models/globalModel.php");


function selectAllClassD($pdo){
    try{
        $query = 'select * from classD';

        $scpList = $pdo->prepare($query);

        $scpList->execute();

        $scp = $scpList->fetchAll();
        
        return $scp;
    }catch(PDOEXCEPTION $e){
        $message = $e->getMessage();
        die($message);
    }
}

function createClassD($pdo){
    try{
        $query = 'insert into classd(classDName, classDFirstName,
        classDMatricule, classDMentalIssues, classDEthnic, siteID, classDImg) values
        (:classDName, :classDFirstName, :classDMatricule, :classDMentalIssues,
        :classDEthnic, :siteID, :classDImage)';

        $ajouteSCP = $pdo->prepare($query);
        $img = uploadImage("ClasseD");
        var_dump($img);
        $ajouteSCP->execute([
            'classDFirstName' => $_POST["classDFirstName"],
            'classDName' => $_POST["classDName"],
            'classDMentalIssues' => $_POST["classDMentalIssues"],
            'classDMatricule' => $_POST["classDMatricule"],
            'classDEthnic' => $_POST["classDEthnic"],
            'siteID' => $_POST["site"],
            'classDImage' => $img
        ]);

        return true;
    } catch(PDOEXCEPTION $e){
        $message = $e->getMessage();
        die($message);
    }
}

function deleteClassDFromID($pdo){
    try{
        
        $query = 'select classDImg from guards where classDID = :classDID';
        $scientist = $pdo->prepare($query);

        $scientist->execute([
            'classDID' => $_GET["classDID"]
        ]);

        $GuardInfos = $scientist->fetch();
        
      
        if(unlink("Assets/Pictures/ClasseD/" . $GuardInfos->GuardImg)){
            echo("Assets/Pictures/ClasseD/" . $GuardInfos->GuardImg . " successfully deleted");
        }
        
        

        $query = 'delete from guards where classDID = :classDID';
        $deleteSCP = $pdo->prepare($query);

        $deleteSCP->execute([
            'classDID' => $_GET["classDID"]
        ]);



    }catch(PDOEXCEPTION $e){
        die($e->getMessage());
    }
}
