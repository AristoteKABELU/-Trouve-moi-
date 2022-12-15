<?php $title = 'Utilisateurs' ?>

<?php ob_start(); ?>

<div>
    <?php if (!(isset($dashboard))):?>
    <h3>Utilisateur:  <?= htmlspecialchars($_SESSION['user_name'])?></h3>
    <?php endif;?>
</div>

<a href="./index.php" class="btn btn-danger mt-4">Retour</a>

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
    <div>
        <?php if ( $page < $pages): ?>
        <a href="index.php?action=scores&p=<?= $page + 1?>" class="btn btn-primary">Page Suivante</a>
        <?php endif ?>
        <?php if ($page > 1): ?>
            <a href="index.php?action=scores&p=<?= $page - 1?>" class="btn btn-primary">Page precedente</a>
        <?php endif ?>
    </div>
</div>

<?php $content= ob_get_clean(); ?>
<?php require('./templates/layout/layout.php'); ?>