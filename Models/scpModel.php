<?php


function selectSCP($pdo){
    try{
        $query = 'select * from scp';

        $scpList = $pdo->prepare($query);

        $scpList->execute();

        $scp = $scpList->fetchAll();
        
        var_dump($scp);
        return $scp;
    }catch(PDOEXCEPTION $e){
        $message = $e->getMessage();
        die($message);
    }
}
