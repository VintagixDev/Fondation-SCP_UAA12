<?php

require_once("Models/userModel.php");

if($uri === "/connexion"){
    $title = "SCP Fondation - Connexion";
    $template = "Views/Users/connexion.php";
    require_once("Views/base.php");
}
else if($uri === "/inscription"){
    if(isset($_POST['btnEnvoi'])){

        $messageError = verifEmptyData();
        if(!$messageError){
            //ajout de l'user à la bdd
            createUser($pdo);
            //redirection vers la page de connexion
            header('location:/connexion');
        }
    }
    $title = "Inscription";
    $template = "Views/Users/inscription.php";
    require_once("Views/base.php");
}

function verifEmptyData(){
    foreach($_POST as $key => $value){
        if(empty(str_replace(' ', '', $value))){
            $messageError[$key] = "Votre" . $key . " est vide";
        }
    }

    if(isset($messageError)){
        return $messageError;
    } else{
        return false;
    }
}