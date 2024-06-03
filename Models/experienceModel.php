<?php

function selectAllExperiences($pdo){
    try{
        $query = 'select * from experiences';

        $experiencesList = $pdo->prepare($query);

        $experiencesList->execute();

        $experiences = $experiencesList->fetchAll();
        
        return $experiences;
    }catch(PDOEXCEPTION $e){
        $message = $e->getMessage();
        die($message);
    }
}

function selectExperienceFromID($pdo){
    try{
        $query = 'select * from experiences where experienceID = :experienceID';
        $experienceRequest = $pdo->prepare($query);
        $experienceRequest->execute([
            'experienceID' => $_GET["experienceID"]
        ]);
        $experience = $experienceRequest->fetch();
        return $experience;
    }catch(PDOException $e){
        die($e->getMessage());
    }
}

function createExperience($pdo){
    try{
        $query = 'insert into experiences(experienceDate, experienceDescription,
        experienceTitre, classDID, scientistID, guardID, SCPID) values
        (:experienceDate, :experienceDescription, :experienceNote, :classDID,
        :scientistID, :guardID, :SCPID)';

        $ajouteSCP = $pdo->prepare($query);
        $ajouteSCP->execute([
            'experienceDate' => $_POST["experienceDate"],
            'experienceDescription' => $_POST["experienceDescription"],
            'experienceNote' => $_POST["experienceNote"],
            'classDID' => $_POST["classDID"],
            'scientistID' => $_POST["scientistID"],
            'guardID' => $_POST["guardID"],
            'SCPID' => $_POST["SCPID"]
        ]);

        return true;
    } catch(PDOEXCEPTION $e){
        $message = $e->getMessage();
        die($message);
    }
}


function updateExperience($pdo){
    try{

        $query = "update experiences set experienceDate = :experienceDate, experienceDescription = :experienceDescription, experienceTitre = :experienceNote, classDID = :classDID, SCPID = :SCPID, scientistID = :scientistID, GuardID = :GuardID where experienceID = :experienceID";

        $updateUser = $pdo->prepare($query);

        $updateUser->execute([
            'experienceDate' => $_POST["experienceDate"],
            'experienceDescription' => $_POST["experienceDescription"],
            'experienceNote' => $_POST["experienceNote"],
            'classDID' => $_POST["classDID"],
            'scientistID' => $_POST["scientistID"],
            'GuardID' => $_POST["guardID"],
            'SCPID' => $_POST["SCPID"],
            'experienceID' => $_GET["experienceID"]
        ]);

    }catch(PDOException $e){
        die($e->getMessage());
    }
}




function DeleteExperience($pdo){
    try{
        $query = 'DELETE FROM experiences where experienceID = :experienceID';
        $prepareRequest = $pdo->prepare($query);
        $prepareRequest->execute([
            'experienceID' => $_GET["experienceID"]
        ]);
    }catch(PDOException $e){
        die($e->getMessage());
    }
}