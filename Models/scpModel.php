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
