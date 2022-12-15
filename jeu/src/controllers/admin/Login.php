<?php

namespace App\controllers\admin;

use App\model\User;
use App\otherClass\Pagination;

class login
{    
    /**
     * execute {Dashboard template} if is set $_SESSION['admin_name'], else {login template}
     *
     * @param  mixed $input
     * @return void
     */
    public function execute (array $input, array $input_page) : void
    {
        if (isset($input['admin_name'])) {
            $dashboard = 1; 
            $page =  $input_page['p'] ?? 1;
            $offset = Pagination::offset($page);
            $users = (new User())->getUsers($offset);
            require('./templates/admin/dashboard.php');
        } else {
            require('./templates/admin/login.php');
        }
    }
}