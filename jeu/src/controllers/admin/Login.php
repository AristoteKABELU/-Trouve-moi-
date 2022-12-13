<?php

namespace App\controllers\admin;

use App\model\User;

class login
{    
    /**
     * execute {Dashboard template} if is set $_SESSION['admin_name'], else {login template}
     *
     * @param  mixed $input
     * @return void
     */
    public function execute (array $input) : void
    {
        if (isset($input['admin_name'])) {
            $dashboard = 1; 
            $users = (new User())->getUsers();
            require('./templates/admin/dashboard.php');
        } else {
            require('./templates/admin/login.php');
        }
    }
}