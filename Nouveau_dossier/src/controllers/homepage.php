<?php

namespace Application\src\controllers\Homepage;

require_once('./src/model/database.php');
use Application\src\model\database\DataBase;

class Homepage
{
    public function execute(string $user_name, string $stat)
    {   
        $stat = $stat;
        $score = DataBase::getScore($user_name);            
        $message = "{$user_name} Appuyez sur <span>\"Jouer\"</span>";
        $attribut = 'disabled';
        $_POST['name'] = $user_name;
        require('./templates/homepage.php');
    }
}