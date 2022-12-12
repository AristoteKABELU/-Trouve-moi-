<?php
namespace App\controllers\user;

use App\model\Database;
use App\model\User;

class Score
{    
    /**
     * show all user score
     *
     * @return void
     */
    public function execute(){
        $users = new User;
        $users = $users->getUsers();
        require('./templates/scores.php');
    }
}