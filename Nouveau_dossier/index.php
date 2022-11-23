<?php
require('./src/functions.php');
require_once('./src/model/database.php');
require_once('./src/controllers/jeu.php');
require_once('./src/controllers/homepage.php');
require_once('./src/controllers/addScore.php');



//use names spaces
use Application\src\model\DataBase\DataBase;
use Application\src\controllers\Jeu\Jeu;
use Application\src\controllers\Homepage\Homepage;
use Application\src\controlleurs\addScore\AddScore;

init_php_session();

session_destroy();
session_unset();


try{
    if(isset($_POST['name']) && !empty($_POST['name'])){
        (new Jeu())->execute($_POST['name']);

    }else if(isset($_SESSION['user_name'])){
        if(isset($_GET['score']) && isset($_GET['stat'])){

        }
    }else{
        require('./templates/homepage.php');
    }

}catch(Exception $e){
    echo $e->getMessage();
}