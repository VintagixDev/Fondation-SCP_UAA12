<?php



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

function selectClassDByID($pdo){
    try{
        $query = 'select * from classd where classDID = :classDID';
        $experienceRequest = $pdo->prepare($query);
        $experienceRequest->execute([
            'classDID' => $_GET["classDID"]
        ]);
        $experience = $experienceRequest->fetch();
        return $experience;
    }catch(PDOException $e){
        die($e->getMessage());
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

function updateClassD($pdo){
    try{

        $query = "update classd set classDFirstName = :classDFirstName, classDName = :classDName, classDMentalIssues = :classDMentalIssues, classDMatricule = :classDMatricule, classDEthnic = :classDEthnic, siteID = :siteID where classDID = :classDID";

        $updateUser = $pdo->prepare($query);

        $updateUser->execute([
            'classDFirstName' => $_POST["classDFirstName"],
            'classDName' => $_POST["classDName"],
            'classDMentalIssues' => $_POST["classDMentalIssues"],
            'classDMatricule' => $_POST["classDMatricule"],
            'classDEthnic' => $_POST["classDEthnic"],
            'siteID' => $_POST["site"],
            'classDID' => $_GET["classDID"]
        ]);

    }catch(PDOException $e){
        die($e->getMessage());
    }
}

function deleteClassDFromID($pdo){
    try{
        
        $query = 'select classDImg from classd where classDID = :classDID';
        $scientist = $pdo->prepare($query);

        $scientist->execute([
            'classDID' => $_GET["classDID"]
        ]);

        $GuardInfos = $scientist->fetch();
        
      
        if(unlink("Assets/Pictures/ClasseD/" . $GuardInfos->classDImg)){
            echo("Assets/Pictures/ClasseD/" . $GuardInfos->classDImg . " successfully deleted");
        }
        
        $query = 'delete from experiences where classDID = :classDID';
        $deleteSCP = $pdo->prepare($query);

        $deleteSCP->execute([
            'classDID' => $_GET["classDID"]
        ]);

        $query = 'delete from classd where classDID = :classDID';
        $deleteSCP = $pdo->prepare($query);

        $deleteSCP->execute([
            'classDID' => $_GET["classDID"]
        ]);



    }catch(PDOEXCEPTION $e){
        die($e->getMessage());
    }
}

function selectClassDFromExperience($pdo, $experienceID){
    try{

        $query = 'SELECT * FROM classd where classDID = (SELECT classDID FROM experiences WHERE experienceID = ' . $experienceID . ');';
        $prepareRequest = $pdo->prepare($query);
        $prepareRequest->execute();
        $classD = $prepareRequest->fetch();
        return $classD;

    }catch(PDOEXception $e){
        $message = $e->getMessage();
        die($message);
    }
}