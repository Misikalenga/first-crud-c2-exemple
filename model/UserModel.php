<?php
# model/UserModel.php

function connectUser(PDO $con, string $userLogin, string $userPwd): bool
{
    // requête préparée que sur le login (champ unique)
    $request = $con->prepare("SELECT * FROM `user` WHERE `user_login`= ?");
    try{
        $request->execute([$userLogin]);
        // on a récupéré personne
        if($request->rowCount()===0) return false;
        // on a donc UN utilisateur (champ unique),
        $result = $request->fetch();
        // bonne pratique
        $request->closeCursor();
        // on va vérifier son mot de passe
        // entre celui passé par le formulaire et celui venant de la DB
        if(password_verify($userPwd,$result['user_pwd'])){
            // on met en session tout ce qu'on a été récupéré de la requête
            // tableau associatif = tableau associatif
            $_SESSION = $result;

            // suppression du mot de passe
            unset($_SESSION['user_pwd']);
            return true;
        }else{
            return false;
        }

    }catch (Exception $e){
        die($e->getMessage());
    }
}

function disconnectUser(): void
{
    # suppression des variables de sessions
    session_unset();

    # suppression du cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    # Destruction du fichier lié sur le serveur
    session_destroy();
}