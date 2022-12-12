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