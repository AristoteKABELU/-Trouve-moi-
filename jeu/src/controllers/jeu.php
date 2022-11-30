<?php

namespace App\controllers;

use App\model\DataBase;


class Jeu
{
    /**
     * affiche la page "Jeu" avec l'enregistrement de la session
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