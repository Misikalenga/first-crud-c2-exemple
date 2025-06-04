<?php


/**
 * @param PDO $con
 * @param array $postDatas
 * @return bool
 */
function addArticle(PDO $con, array $postDatas): bool
{
    // vérification des champs obligatoires
    if(!isset(  $postDatas['user_iduser'],
                $postDatas['article_title'],
                $postDatas['article_text']
    )) return false;
    // comme utilisation d'un champ de formulaire
    // pour passer l'id de la personne qui poste
    // On vérifie que c'est bien la personne connectée qui poste
    if($postDatas['user_iduser']!=$_SESSION['iduser']) return false;

    // préparation de la requête
    $sql="
    INSERT INTO `article`
        (`article_title`,`article_text`,`article_date_published`,`article_is_published`,`user_iduser`) VALUES 
        (?,?,?,?,?);
    ";

    // traitement des champs
    $iduser = (int) $postDatas['user_iduser'];
    $title = htmlspecialchars(strip_tags(trim($postDatas['article_title'])),ENT_QUOTES);
    if(empty($title)||strlen($title)>120) return false;

    $text = htmlspecialchars(strip_tags(trim($postDatas['article_text'])),ENT_QUOTES);
    if(empty($text)) return false;

    // si on a coché 'publié'
    if(isset($postDatas['article_is_published'])){
        $isPublished = 1;
        $datePublished = $postDatas['article_date_published'];
    }else{
        $isPublished = 0;
        $datePublished = null;
    }

    // préparation de la requête
    $query = $con->prepare($sql);

    try{
        $query->execute([$title,$text,$datePublished,$isPublished,$iduser]);
        return true;
    }catch(Exception $e){
        die($e->getMessage());
    }

}


/**
 * @param PDO $connection
 * @return array
 * Récupération des articles pour la partie publique
 */
function getArticlesPublic(PDO $connection): array
{

    $sql = "
    SELECT a.`idarticle`, a.`article_title`, LEFT(a.`article_text`,300) AS article_text, a.`article_date_published`, a.`article_is_published`,
              u.`iduser`, u.`user_login`, u.`user_name`
        FROM article a
        INNER JOIN user u
            ON u.`iduser` = a.`user_iduser`
        WHERE a.`article_is_published` = 1
        # AND a.`idarticle`=2
    ORDER BY a.`article_date_published` DESC,
             a.`article_date_created` DESC;
    ;
    ";

    $prepare = $connection->prepare($sql);

    try{
        $prepare->execute();
        $result = $prepare->fetchAll();
        $prepare->closeCursor();
        return $result;
    }catch(Exception $e){
        die($e->getMessage());
    }
}

/**
 * @param string $text
 * @return string|null
 * Pour éviter de couper les mots
 */
function cutText(string $text): ?string
{
    // position du dernier espace
    $spacePlace = strrpos($text," ");
    // on coupe le texte de 0 jusqu'au dernier espace
    $text = substr($text,0,$spacePlace);
    // si on a du texte, on le renvoie
    if(strlen($text)>0) return $text;
    // envoi null si pas / plus de texte
    return null;
}