<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="templates/asset/css/style.css">
    <link rel="stylesheet" href="templates/asset/bootstrap-5.2.1/css/bootstrap.min.css">
    <script src="templates/asset/js/script.js" defer></script>
    <title><?= $title??"Trouves moi"?></title>
</head>
<body class="<?= $page?? null ?>">
    <?= $content; ?>
</body>
</html>