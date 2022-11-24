<?php $title = "Acceuil" ;?>

<?php ob_start(); ?>

<div class="">
    <form action="index.php" method="POST">
        <input type="text" name="user_name" id=""  placeholder="Utilisateur(Ex:Ariskab22)" required>
        <input type="submit" value="Jouer">
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('layout/layout.php'); ?>