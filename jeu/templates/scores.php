<?php 
$title = isset($dashboard)?'Dashboard':'Utilisateurs';?>
<?php ob_start(); ?>

<div>
    <?php if (!(isset($dashboard))):?>
    <h3>Utilisateur:  <?= htmlspecialchars($_SESSION['user_name'])?></h3>
    <?php endif;?>
</div>
<?php if (isset($dashboard)): ?>
    <a href="index.php?admin=deconnexion" class="btn btn-secondary mt-4">Deconnexion</a>
<?php else: ?>
    <a href="./index.php" class="btn btn-danger mt-4">Retour</a>
<?php endif ?>
<div>
    <table class="table">
        <thead>
            <tr>
                <th>Nom Utilisateur</th>
                <th>Score</th>
                <th>Date debut</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
                <tr>
                    <td><?=htmlspecialchars($user['user_name'])?></td>
                    <td><?=$user['score']?></td>
                    <td><?=$user['creation_date']?></td>
                    <td>
                        <?php if((isset($dashboard))): ?>
                            <form action="index.php?admin=delete&username=<?=htmlspecialchars($user['user_name'])?>" onsubmit="return confirm('Voulez vous supprimez cet utilisateur?')" method="POST">
                                <button type="submit" class="btn btn-danger mb-1">supprimer</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php $content= ob_get_clean(); ?>
<?php require('./templates/layout/layout.php'); ?>