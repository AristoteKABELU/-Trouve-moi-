<?php 

namespace App\controllers\user;

use App\model\User;

class InDatabase
{    
    /**
     * execute verification, if user exists
     *
     * @param  mixed $userName
     * @return bool
     */
    public function execute(string $userName):bool
    {
        $user = new User;
        return $user->in_DataBase($userName);
    }
}