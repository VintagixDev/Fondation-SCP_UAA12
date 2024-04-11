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
