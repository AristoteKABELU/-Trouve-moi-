<?php
namespace App\controllers;

use App\model\Database;

class Score
{    
    /**
     * show all user score
     *
     * @return void
     */
    public function execute(){
        $users = DataBase::getUsers();
        require('./templates/scores.php');
    }
}