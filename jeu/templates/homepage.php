<?php 
$title = "Acceuil" ;
$page = "homepage"
?>

<?php ob_start(); ?>
<div class="container">
    <div class="p-90">
        <?php if ($exist):?>
        <p class="alert alert-danger">Cet Utilisateur existe deja</p>
        <?php endif; ?>
        <div class="">
            <form class="form-group" action="index.php" method="POST">
                <input class="form-control mb-2" type="text" name="user_name" id=""  placeholder="Utilisateur(Ex:Ariskab22)" required>
                <input class="btn btn-primary" type="submit" value="Jouer">
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('layout/layout.php'); ?>