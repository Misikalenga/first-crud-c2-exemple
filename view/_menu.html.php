<?php
# view/_menu.html.php
?>
<nav id="navmenu" class="navmenu">
    <ul>
        <li><a href="./">Accueil<br></a></li>
        <li><a href="./?p=about">A propos</a></li>
        <?php
        // si nous sommes connectés
        if(isset($_SESSION['user_login'])):
            ?>
            <li><a href="#" class="disabled"><?=$_SESSION['user_name']?> | connecté en tant que <?=$_SESSION['user_role']?></a></li>
            <li><a href="./?p=admin">Administration</a></li>
            <li><a  href="./?p=disconnect">Déconnexion</a></li>
        <?php
        else:
            ?>
            <li><a  href="./?p=connect">Connexion</a></li>
        <?php
        endif;
        ?>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>

