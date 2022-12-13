<?php 
namespace App\controllers\admin;

use App\model\Admin;

class Delete
{    
    /**
     * execute delete option
     *
     * @param  mixed $user_name
     * @return void
     */
    public function execute(string $user_name):void
    {
        $user = new Admin;
        $user->delete_user($user_name);
    }
}