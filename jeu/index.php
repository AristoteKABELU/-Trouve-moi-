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
    else if (isset($_GET['admin']) && !empty($_GET['admin'])){
        if ($_GET['admin'] === 'login'){
            (new login())->execute($_SESSION);
            
        }elseif ($_GET['admin'] === 'delete'){
            (new Delete())->execute($_GET['username']);
            (new login())->execute($_SESSION);

        } elseif ($_GET['admin'] === 'deconnexion') {
            (new Logout())->execute();

        } else {
            throw new Exception("404! Page not Found");
        }
    }else if(isset($_SESSION['user_name'])){
        if(isset($_GET['score'])){
            (new AddScore())->execute($_SESSION['user_name'], $_GET['score']);
            header('Location: index.php');

        }elseif(isset($_GET['action']) && !empty($_GET['action'])){
            if($_GET['action'] === 'scores'){
                (new Score())->execute();
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