<?php
require('./src/functions.php');
require_once('./src/model/database.php');
require_once('./src/controllers/jeu.php');
require_once('./src/controllers/addScore.php');
require_once('./src/controllers/scores.php');


//use names spaces
use Application\src\model\DataBase\DataBase;
use Application\src\controllers\Jeu\Jeu;
use Application\src\controlleurs\addScore\AddScore;
use Application\src\controllers\score\Score;

init_php_session();

/* session_destroy();
session_unset();
 */

$exist = null;

try{
    if(isset($_POST['user_name']) && !empty($_POST['user_name'])){
        if (DataBase::in_DataBase($_POST['user_name'])){
            $exist = $_POST['user_name'];
            require('./templates/homepage.php');
        }else{
            DataBase::registerUser($_POST['user_name']);
            (new Jeu())->execute($_POST['user_name']);
        }

    }else if(isset($_SESSION['user_name'])){
        if(isset($_GET['score']) && isset($_GET['stat'])){
            (new AddScore())->execute($_SESSION['user_name'], $_GET['score']);
            header('Location: index.php');

        }if(isset($_GET['action']) && !empty($_GET['action'])){
            if($_GET['action'] === 'scores'){
                (new Score())->execute();
            }
        }
        else{
            (new Jeu())->execute($_SESSION['user_name']);
        }
    }else{
        require('./templates/homepage.php');
    }

}catch(Exception $e){
    echo $e->getMessage();
}