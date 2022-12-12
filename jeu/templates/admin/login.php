<?php 
$title = "Authentification"?>
<?php ob_start(); ?>

<form action="" method="POST" class="p-5">
    <h1>Authentification</h1>
    <div class="form-group">
        <input class="form-control mb-2" type="text" name="admin_name" placeholder="Nom utilisateur" required>
        <input class="form-control mb-2" type="password" name="password_admin" placeholder="Mot de passe" required>
    </div>
    <button class="btn btn-primary" type="submit">Se connecter</button>
</form>

<?php $content= ob_get_clean(); ?>
<?php require('./templates/layout/layout.php'); ?>
