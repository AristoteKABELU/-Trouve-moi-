<?php
namespace Application\src\controllers\score;

require_once('./src/model/database.php');
use Application\src\model\database\DataBase;

class Score
{
    public function execute(){
        $users = DataBase::getUsers();
        require('./templates/scores.php');
    }
}