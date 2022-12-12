<?php $title = 'Trouve moi'?>
<?php ob_start(); ?>

<div class="row">
    <div>
        <h5>Utilisateur: <?=htmlspecialchars($user_name)?></h5>
        <h5>Score: <?=$score?></h5>
        <a href="./index.php?action=scores" class="btn btn-secondary">Autres Utilisateurs</a>
    </div>
    <div>
        <h1 class="titre">Trouver le chiffre "1"</h1>
        <div class="conteneur" id="parent">
            <div class ="block" id="b1"></div>
            <div class ="block" id="b2"></div>
            <div class ="block" id="b3"></div>
            <div class ="block" id="b4"></div>
        </div>
        <div class="center">
            <button id="start" class="btn_jeu">Lancer le jeu</button>
        </div>
    </div>
    <div>
        <h5>Le Code source: <a href="https://github.com/AristoteKABELU" target="_blank"> AristoteKABELU</a></h5>        
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('layout/layout.php'); ?>


