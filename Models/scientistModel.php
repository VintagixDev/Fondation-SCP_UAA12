<?php


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

function selectScientistByID($pdo){
    try{
        $query = 'select * from scientist where scientistID = :scientistID';
        $experienceRequest = $pdo->prepare($query);
        $experienceRequest->execute([
            'scientistID' => $_GET["scientistID"]
        ]);
        $experience = $experienceRequest->fetch();
        return $experience;
    }catch(PDOException $e){
        die($e->getMessage());
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

function updateScientist($pdo){
    try{

        $query = "update scientist set scientistFirstName = :scientistLastName, scientistName = :scientistName, scientistDescription = :scientistDescription, scientistRank = :scientistRank, siteID = :siteID where scientistID = :scientistID";

        $updateUser = $pdo->prepare($query);

        $updateUser->execute([
            'scientistLastName' => $_POST["scientistLastName"],
            'scientistName' => $_POST["scientistName"],
            'scientistDescription' => $_POST["scientistDescription"],
            'scientistRank' => $_POST["scientistRank"],
            'siteID' => $_POST["site"],
            'scientistID' => $_GET["scientistID"]
        ]);

    }catch(PDOException $e){
        die($e->getMessage());
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

function selectScientistFromExperience($pdo, $experienceID){
    try{

        $query = 'SELECT * FROM scientist where scientistID = (SELECT scientistID FROM experiences WHERE experienceID = ' . $experienceID . ');';
        $prepareRequest = $pdo->prepare($query);
        $prepareRequest->execute();
        $scientist = $prepareRequest->fetch();
        return $scientist;

    }catch(PDOEXception $e){
        $message = $e->getMessage();
        die($message);
    }
}

