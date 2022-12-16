<?php

require 'vendor/autoload.php';

use App\controllers\user\Jeu;
use App\controllers\user\AddScore;
use App\controllers\user\Score;
use App\controllers\admin\Dashboard;
use App\controllers\admin\login;
use App\controllers\admin\Logout;
use App\controllers\admin\Delete;
use App\controllers\user\InDatabase;
use App\otherClass\Session;

//Session valide pendant 1 Mois
Session::init_session(60*60*24*30);
$exist = null;


try{
    if (isset($_POST['user_name']) && !empty($_POST['user_name'])) {
        if ((new InDatabase())->execute($_POST['user_name'])) {
            $exist = $_POST['user_name'];
            require('./templates/homepage.php');
        }else{
            (new Jeu())->execute($_POST['user_name']);
        }

    }else if(isset($_POST['admin_name']) && isset($_POST['password_admin'])){
        (new Dashboard())->execute($_POST, $_SESSION);
    }
    else if (isset($_GET['admin'])){
        if ($_GET['admin'] === 'login'){
            (new login())->execute($_SESSION, $_GET);
            
        }elseif (($_GET['admin'] === 'delete') && isset($_POST['username'])) {
            (new Delete())->execute($_POST['username']);
            (new login())->execute($_SESSION, $_GET);

        } elseif ($_GET['admin'] === 'deconnexion') {
            (new Logout())->execute();

        } elseif (isset($_GET['p'])) {
            (new login())->execute($_SESSION, $_GET);
        } else {
            throw new Exception("404! Page not Found");
        }
    }else if(isset($_SESSION['user_name'])){
        if(isset($_GET['score'])){
            (new AddScore())->execute($_SESSION['user_name'], $_GET['score']);
            header('Location: index.php');

        }elseif(isset($_GET['action']) && !empty($_GET['action'])){
            if($_GET['action'] === 'scores'){
                (new Score())->execute($_GET);
            }
        } else {
            (new Jeu())->execute($_SESSION['user_name']??'');
        }
    }else{
        require('./templates/homepage.php');
    }
}catch(Exception $e){
    echo $e->getMessage();
}