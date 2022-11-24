<?php

namespace Application\src\controllers\Jeu;

require_once('./src/model/database.php');
use Application\src\model\database\DataBase;


class Jeu
{
    public function execute(string $name):void
    {
        $_SESSION['user_name'] = strtoupper($name);
        $user_name = $_SESSION['user_name'];
        $score = DataBase::getScore($user_name);

        
        require('./templates/jeu.php');
    }
}
?>