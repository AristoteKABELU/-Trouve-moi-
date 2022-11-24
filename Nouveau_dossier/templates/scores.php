<?php $title = 'Utilisateurs' ?>
<?php ob_start(); ?>

<div>
    <h3>Utilisateur:  <?= htmlspecialchars($_SESSION['user_name'])?></h3>
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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<a href="./index.php">Retour</a>

<?php $content= ob_get_clean(); ?>
<?php require('./templates/layout/layout.php'); ?>