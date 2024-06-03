<?php



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

function selectGuardByID($pdo){
    try{
        $query = 'select * from guards where GuardID = :GuardID';
        $experienceRequest = $pdo->prepare($query);
        $experienceRequest->execute([
            'GuardID' => $_GET["GuardID"]
        ]);
        $experience = $experienceRequest->fetch();
        return $experience;
    }catch(PDOException $e){
        die($e->getMessage());
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

function updateGuard($pdo){
    try{

        $query = "update guards set GuardName = :GuardLastName, GuardFirstName = :GuardName, GuardDescription = :GuardDescription, GuardRank = :GuardRank, siteID = :siteID where GuardID = :GuardID";

        $updateUser = $pdo->prepare($query);

        $updateUser->execute([
            'GuardName' => $_POST["GuardName"],
            'GuardLastName' => $_POST["GuardLastName"],
            'GuardDescription' => $_POST["GuardDescription"],
            'GuardRank' => $_POST["GuardRank"],
            'siteID' => $_POST["site"],
            'GuardID' => $_GET["GuardID"]
        ]);

    }catch(PDOException $e){
        die($e->getMessage());
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

function selectGuardFromExperience($pdo, $experienceID){
    try{

        $query = 'SELECT * FROM guards where GuardID = (SELECT GuardID FROM experiences WHERE experienceID = ' . $experienceID . ');';
        $prepareRequest = $pdo->prepare($query);
        $prepareRequest->execute();
        $guard = $prepareRequest->fetch();
        return $guard;

    }catch(PDOEXception $e){
        $message = $e->getMessage();
        die($message);
    }
}