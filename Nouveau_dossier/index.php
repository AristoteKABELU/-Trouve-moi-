<?php
require('./src/functions.php');
require_once('./src/model/database.php');
require_once('./src/controllers/jeu.php');
require_once('./src/controllers/addScore.php');


//use names spaces
use Application\src\model\DataBase\DataBase;
use Application\src\controllers\Jeu\Jeu;
use Application\src\controlleurs\addScore\AddScore;

init_php_session();

/* session_destroy();
session_unset();
 */
try{
    if(isset($_POST['user_name']) && !empty($_POST['user_name'])){
        (new Jeu())->execute($_POST['user_name']);

    }else if(isset($_SESSION['user_name'])){
        if(isset($_GET['score']) && isset($_GET['stat'])){
            (new AddScore())->execute($_SESSION['user_name'], $_GET['score']);
            header('Location: index.php');
        }else{
            (new Jeu())->execute($_SESSION['user_name']);
        }
    }else{
        require('./templates/homepage.php');
    }

}catch(Exception $e){
    echo $e->getMessage();
}