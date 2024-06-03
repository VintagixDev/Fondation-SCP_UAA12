<?php

function createUser($pdo){
    try{
        $query = 'insert into user(userFirstName, userLastName,
        userEmail, userPassword, userPermission) values
        (:prenomUser, :nomUser, :userEmail, :userPassword,
        :userPermission)';

        $ajouteUser = $pdo->prepare($query);

        $ajouteUser->execute([
            'prenomUser' => $_POST["prenom"],
            'nomUser' => $_POST["nom"],
            'userEmail' => $_POST["email"],
            'userPassword' => $_POST["password"],
            'userPermission' => "default"
        ]);
    } catch(PDOEXCEPTION $e){
        $message = $e->getMessage();
        die($message);
    }
}

function connectUser($pdo){
    try{
        $query = 'select * from user where userEmail = :loginUser and userPassword = :passWordUser';

        $connectUser = $pdo->prepare($query);

        $connectUser->execute([
            'loginUser' => $_POST["email"],
            'passWordUser' => $_POST['password']
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

        $query = "update user set userLastName = :nomUser, userFirstName = :prenomUser, userPassword = :passWordUser, userEmail = :emailUser where userID = :id";

        $updateUser = $pdo->prepare($query);

        $updateUser->execute([
            'nomUser' => $_POST['nom'],
            'prenomUser' => $_POST['prenom'],
            'emailUser' => $_POST['email'],
            'passWordUser' => $_POST['password'],
            'id' => $_SESSION['user']->userID
        ]);

    }catch(PDOException $e){
        die($e->getMessage());
    }
}

function updateSession($pdo){
    try{
        $query = 'select * from user where userID = :id';
        $selectUser = $pdo->prepare($query);
        $selectUser->execute([
            'id' => $_SESSION['user']->userID
        ]);
        $user = $selectUser->fetch();
        $_SESSION['user'] = $user;
    }catch(PDOException $e){
        die($e->getMessage());
    }
}


function DeleteUser($pdo){
    try {
        $query = 'delete from user where userID = :userID';
        $delUser = $pdo->prepare($query);
        $delUser->execute([
            'userID' => $_SESSION["user"]->userID
        ]);

    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}