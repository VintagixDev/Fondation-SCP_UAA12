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
            'siteId' => $_GET["siteId"]
        ]);

        $site = $siteList->fetch();

        return $site;
        
    }catch(PDOException $e){
        die($e->getMessage());
    }
}
