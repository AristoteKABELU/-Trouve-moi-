<?php 
$title = isset($dashboard)?'Dashboard':'Utilisateurs';?>
<?php ob_start(); ?>

<div>
    <?php if (!(isset($dashboard))):?>
    <h3>Utilisateur:  <?= htmlspecialchars($_SESSION['user_name'])?></h3>
    <?php endif;?>
</div>
<div>
    <table>
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
                    <td><?=$user['user_name']?></td>
                    <td><?=$user['score']?></td>
                    <td><?=$user['creation_date']?></td>
                    <td>
                        <?php if((isset($dashboard))): ?>
                            <form action="index.php?admin=delete&username=<?=$user['user_name']?>" onsubmit="return confirm('Voulez vous supprimez cet utilisateur?')">
                                <button type="submit" class="btn btn-danger mb-1">supprimer</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<a href="./index.php">Retour</a>

<?php $content= ob_get_clean(); ?>
<?php require('./templates/layout/layout.php'); ?>