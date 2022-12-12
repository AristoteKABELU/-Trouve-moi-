<?php

require 'vendor/autoload.php';

require_once('src/functions.php');

use App\controllers\user\Jeu;
use App\controllers\user\AddScore;
use App\controllers\user\Score;
use App\controllers\admin\Dashboard;
use App\controllers\user\Delete;
use App\controllers\user\InDatabase;

init_php_session();
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
        (new Dashboard())->execute($_POST);
    }
    else if (isset($_GET['admin']) && !empty($_GET['admin'])){
        if ($_GET['admin'] === 'login'){
            require('./templates/admin/login.php');
            
        }elseif ($_GET['admin'] === 'delete'){
            (new Delete())->execute($_GET['username']);
            (new Dashboard())->execute($_POST);
        }
        else{
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
        }
        else{
            (new Jeu())->execute($_SESSION['user_name']??'');
        }
    }else{
        require('./templates/homepage.php');
    }
}catch(Exception $e){
    echo $e->getMessage();
}