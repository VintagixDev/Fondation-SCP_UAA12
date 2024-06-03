<?php

require_once("Models/userModel.php");

if($uri === "/connexion"){
    if(isset($_POST['btnEnvoi'])){
        $erreur = false;
        if(connectUser($pdo)){
            header("location:/");
        }
        else{
            $erreur = true;
        }
    }
    $title = "Connexion";
    $template = "Views/Users/connexion.php";
    require_once("Views/base.php");
}
else if($uri === "/inscription"){
    if(isset($_POST['btnEnvoi'])){

        $messageError = verifEmptyData();
        if(!isset($_SESSION["user"])){
            if(!$messageError){
                //ajout de l'user à la bdd
                createUser($pdo);
                //redirection vers la page de connexion
                header('location:/connexion');
            }
        }else{
            updateUser($pdo);
            header('location:/');
        }

    }
    $title = "Inscription";
    $template = "Views/Users/inscription.php";
    require_once("Views/base.php");
}
else if($uri === "/deconnexion"){
    session_destroy();
    header('location:/');
} else if($uri === "/profil"){
    if(isset($_SESSION["user"])){
        $title = "Profil";
        $template = "Views/Users/profil.php";
        require_once("Views/base.php");
    } else{
        header('location:/');
    }
} elseif($uri === "/updateProfil"){
    if(isset($_SESSION["user"])){
        $messageError = verifEmptyData();
        if(isset($_POST['btnEnvoi'])){
            if(!$messageError){
                UpdateUser($pdo);
                header('location:/profil');
            }
        }
        $title = "Modifier le profil";
        $template = "Views/Users/update.php";
        require_once("Views/base.php");
    } else{
        header('location:/');
    }
} else if($uri === "/deleteProfil"){
    if(isset($_SESSION["user"])){
        DeleteUser($pdo);
        session_destroy();
        header('location:/');
    }
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