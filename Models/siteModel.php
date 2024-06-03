<?php



function selectAllSites($pdo){
    try{
        $query = 'select * from site';

        $siteList = $pdo->prepare($query);

        $siteList->execute();

        $sites = $siteList->fetchAll();
        
        return $sites;
    }catch(PDOEXCEPTION $e){
        $message = $e->getMessage();
        die($message);
    }
}

function selectSiteById($pdo){
    try{
        $query = 'select * from site where siteID = :siteId';

        $siteList = $pdo->prepare($query);
        $siteList->execute([
            'siteId' => $_GET["siteID"]
        ]);

        $site = $siteList->fetch();

        return $site;
        
    }catch(PDOException $e){
        die($e->getMessage());
    }
}

function createSite($pdo){
    try{
        $query = 'insert into site(siteName, siteCountry,
        siteDescription, siteImg) values
        (:siteName, :siteCountry, :siteDescription, :siteImg)';

        $img = uploadImage("Sites");

        $ajouteSCP = $pdo->prepare($query);

        $ajouteSCP->execute([
            'siteName' => $_POST["site_nom"],
            'siteCountry' => $_POST["site_pays"],
            'siteDescription' => $_POST["site_description"],
            'siteImg' => $img
        ]);

        return true;
    } catch(PDOEXCEPTION $e){
        $message = $e->getMessage();
        die($message);
    }
}

function updateSite($pdo){
    try{

        $query = "update site set siteName = :siteName, siteCountry = :siteCountry, siteDescription = :siteDescription where siteID = :siteID";

        $updateUser = $pdo->prepare($query);

        $updateUser->execute([
            'siteName' => $_POST["site_nom"],
            'siteCountry' => $_POST["site_pays"],
            'siteDescription' => $_POST["site_description"],
            'siteID' => $_GET["siteID"]
        ]);

    }catch(PDOException $e){
        die($e->getMessage());
    }
}

function deleteSiteFromID($pdo){
    try{
        
        $query = 'select * from site where siteID = :siteID';
        $site = $pdo->prepare($query);

        $site->execute([
            'siteID' => $_GET["siteID"]
        ]);

        $siteInfos = $site->fetch();
        

        if(unlink("Assets/Pictures/Sites/" . $siteInfos->siteImg)){
            echo("Assets/Pictures/Sites/" . $siteInfos->siteImg . " successfully deleted");
        }
        
        $query = 'delete from scp where siteID = :siteID';
        $deleteSCP = $pdo->prepare($query);
        $deleteSCP->execute([
            'siteID' => $_GET["siteID"]
        ]);

        $query = 'delete from scientist where siteID = :siteID';
        $deleteSCP = $pdo->prepare($query);
        $deleteSCP->execute([
            'siteID' => $_GET["siteID"]
        ]);

        $query = 'delete from site where siteID = :siteID';
        $deleteSite = $pdo->prepare($query);

        $deleteSite->execute([
            'siteID' => $_GET["siteID"]
        ]);



    }catch(PDOEXCEPTION $e){
        die($e->getMessage());
    }
}

