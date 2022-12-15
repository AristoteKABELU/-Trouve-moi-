<?php
namespace App\controllers\user;

use App\model\User;
use App\otherClass\Pagination;

class Score
{    
    /**
     * show all user score
     *
     * @return void
     */
    public function execute (array $input) {
        $users = new User;
        $page =  $input['p'] ?? 1;
        $offset = Pagination::offset($page);
        $users = $users->getUsers($offset);
        require('./templates/scores.php');
    }
}