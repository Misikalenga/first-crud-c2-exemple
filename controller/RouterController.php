<?php

// appel des dépendances
include "../model/ArticleModel.php";
include "../model/UserModel.php";

// si nous sommes connectés
if(isset($_SESSION['user_login'])){
    require_once "../controller/PrivateController.php";
// nous ne sommes pas connectés
}else{
    require_once "../controller/PublicController.php";
}