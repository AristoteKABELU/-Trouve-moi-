<?php

namespace App\controllers\user;

use App\model\DataBase;
use App\model\User;

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
        $user = new User;
        $user->registerUser($name);
        $score = $user->getScore($user_name);

        
        require('./templates/jeu.php');
    }
}
?>