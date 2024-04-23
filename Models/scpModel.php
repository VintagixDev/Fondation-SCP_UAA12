<?php


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

        $img = uploadImageSCP();

        $ajouteUser = $pdo->prepare($query);

        $ajouteUser->execute([
            'SCPMatricule' => $_POST["matricule"],
            'SCPClass' => $_POST["classe"],
            'SCPContainment' => $_POST["containment"],
            'SCPDescription' => $_POST["description"],
            'siteID' => $_POST["site"],
            'SCPImage' => $img
        ]);
    } catch(PDOEXCEPTION $e){
        $message = $e->getMessage();
        die($message);
    }
}

function uploadImageSCP()
{
    //chemin images
    $upload_dir = 'Assets/Pictures/SCP/';
  
    if ($_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['profile_image']['tmp_name'];
        $original_name = $_FILES['profile_image']['name'];
        $extension = pathinfo($original_name, PATHINFO_EXTENSION);
        $new_name = 'userProfile' . date('YmdHis') . '.' . $extension;
        $destination = $upload_dir . $new_name;

        if (move_uploaded_file($tmp_name, $destination)) {
            return $new_name;
        } else {
            die("Failed to move uploaded file.");
        }
    } else {
        die("File upload failed.");
    }
}