<?php

namespace App\controllers;

use App\model\DataBase;


class Jeu
{
    /**
     * register session and display game party
     * 
     * @return void
     * @param string $name
     */
    public function execute(string $name):void
    {
        $_SESSION['user_name'] = strtolower($name);
        $user_name = $_SESSION['user_name'];
        $score = DataBase::getScore($user_name);

        
        require('./templates/jeu.php');
    }
}
?>