<?php 
namespace App\controllers\user;

use App\model\User;

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
        $user = new User;
        $user->delete_user($user_name);
    }
}