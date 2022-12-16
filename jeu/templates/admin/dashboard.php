<?php $title = "Dashboard"; ?>
<?php ob_start(); ?>

<?php $title = 'Utilisateurs' ?>

<?php ob_start(); ?>

<a href="index.php?admin=deconnexion" class="btn btn-secondary mt-4">Deconnexion</a>

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
                        <form action="index.php?admin=delete" onsubmit="return confirm('Voulez vous supprimez cet utilisateur?')" method="POST">
                            <input type="hidden" name="username" value="<?=$user['user_name']?>">
                            <button type="submit" class="btn btn-danger mb-1">supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div>
        <?php if ($page <  $pages): ?>
        <a href="index.php?admin&p=<?= $page + 1?>" class="btn btn-primary">Page Suivante</a>
        <?php endif ?>
        <?php if ($page > 1): ?>
            <a href="index.php?admin&p=<?= $page - 1?>" class="btn btn-primary">Page precedente</a>
        <?php endif ?>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('./templates/layout/layout.php'); ?>