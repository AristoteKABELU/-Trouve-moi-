<?php
namespace App\controllers;

use App\model\Database;

class Score
{
    public function execute(){
        $users = DataBase::getUsers();
        require('./templates/scores.php');
    }
}