<?php

namespace App\model;

use App\lib\DatabaseConnexion;

class Admin
{
    public $connexion;


    public function __construct()
    {
        $this->connexion = new DatabaseConnexion;
    }
    
        
    /**
     * VerifyPassword
     *
     * @param  mixed $passwordInput
     * @param  mixed $admin_name
     * @return bool
     */
    public static function VerifyPassword (string $admin_name, string $passwordInput) : bool
    {
        if (password_verify($passwordInput, "$2y$10$8JNh3Fr3Y0CxC9VQXua5t.mGVMkKhpqkqSix.y1.5DjKyg6Az7UAa") 
            && $admin_name == 'Admin'){
            return true;
        }
        return false;
    }


    /**
    * delete_user
    *
    * @param  mixed $user
    * @return void
    */
    public function delete_user(string $user):void
    {
        $statement = $this->connexion->getConnection()->prepare(
            'DELETE FROM `t_users` WHERE `user_name` = ?');
        $statement->execute([$user]);
    }

}