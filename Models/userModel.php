<?php

function createUser($pdo){
    try{
        $query = 'insert into guards(guardName, guardFirstName,
        guardDescription, guardGender, guardRank, guardBirthdate) values
        (:nomUser, :prenomUser, :descriptionUser, :genderUser,
        :guardRank, :guardBirthdate)';

        $ajouteUser = $pdo->prepare($query);

        $ajouteUser->execute([
            'nomUser' => $_POST["nom"],
            'prenomUser' => $_POST["prenom"],
            'descriptionUser' => $_POST["description"],
            'genderUser' => 1,
            'guardRank' => $_POST["rank"],
            'guardBirthdate' => $_POST["birthdate"]
        ]);
    } catch(PDOEXCEPTION $e){
        $message = $e->getMessage();
        die($message);
    }
}

function connectUser($pdo){
    try{
        $query = 'select * from guards where GuardName = :loginUser and GuardFirstName = :passWordUser';

        $connectUser = $pdo->prepare($query);

        $connectUser->execute([
            'loginUser' => $_POST["login"],
            'passWordUser' => $_POST['mot_de_passe']
        ]);

        $user = $connectUser->fetch();
        if(!$user){
            return false;
        }
        else{
            $_SESSION["user"] = $user;
            return true;
        }
    }catch(PDOEXCEPTION $e){
        $message = $e->getMessage();
        die($message);
    }
}

function updateUser($pdo){
    try{

        $query = "update guards set nomUser = :nomUser, prenomUser = :prenomUser, passWordUser = :passWordUser, emailUser = :emailUser where id = :id";

        $updateUser = $pdo->prepare($query);

        $updateUser->execute([
            'nomUser' => $_POST['nom'],
            'prenomUser' => $_POST['prenom'],
            'passWordUser' => $_POST['mot_de_passe'],
            'emailUser' => $_POST['email'],
            'id' => $_SESSION['user']->id
        ]);

    }catch(PDOException $e){
        die($e->getMessage());
    }
}

function updateSession($pdo){
    try{
        $query = 'select * from guards where id = :id';
        $selectUser = $pdo->prepare($query);
        $selectUser->execute([
            'id' => $_SESSION['user']->id
        ]);
        $user = $selectUser->fetch();
        $_SESSION['user'] = $user;
    }catch(PDOException $e){
        die($e->getMessage());
    }
}

