<?php $title = 'Trouve moi'?>
<?php ob_start(); ?>


<div>
    
</div>
<div class="row">
    <div>
        <h5>Utilisateur: <?=htmlspecialchars($user_name)?></h5>
        <h5>Score: <?=$score?></h5>
        <a href="./index.php?action=scores">Autres Utilisateurs</a>
    </div>
    <div>
        <h1 class="titre">Trouver le mot <span>"Gagnant"</span></h1>
        <div class="conteneur" id="parent">
            <div class ="block" id="b1">Trouve moi</div>
            <div class ="block" id="b2">Trouve moi</div>
            <div class ="block" id="b3">Trouve moi</div>
            <div class ="block" id="b4">Trouve moi</div>
        </div>
        <div class="center">
            <button id="start" class="btn_jeu">Lancer le jeu</button>
            <a href="./index.php" class="btn_jeu">retour</a>
            <a href="./dec.php" class="btn_jeu">Quitter</a>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('layout/layout.php'); ?>


