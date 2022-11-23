<?php $title = "Acceuil" ;?>

<?php ob_start(); ?>

<div class="">
    <?php if(isset($message)): ?>
    <h5><?= $message ?><h5>
    <?php endif; ?>

    <?php if(!empty($stat)): ?>
        <h6>Vous avez <?= $stat ?>  votre score est de : <?= $score ?> </h6>
    <?php else: ?>
        <h6>Veuillez entrez votre nom utilisateur ;)</h6>
    <?php endif; ?>
    <form action="index.php" method="POST">
        <input type="text" name="name" id=""  placeholder="Nom" <?=$attribut??''?> required style='<?=$display?>'>
        <input type="submit">
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('layout/layout.php'); ?>