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
    public function execute (array $input_page) {
    
        $page =  $input_page['p'] ?? 1;
        $offset = Pagination::offset($page);
        $pages = (new User)->countPage();
        $users = (new User)->getUsers($offset);
        require('./templates/scores.php');
    }
}