<?php $title = "Dashboard"; ?>
<?php ob_start(); ?>

<?php require('./templates/scores.php') ?>

<?php $content = ob_get_clean(); ?>
<?php require('./templates/layout/layout.php'); ?>