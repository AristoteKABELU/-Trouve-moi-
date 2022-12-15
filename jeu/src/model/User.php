<?php

namespace App\model;

use App\lib\DatabaseConnexion;
use App\otherClass\Pagination;

class User
{
    /**
     * allow this class to get connexion to Database
     * @return instance of @{DatabaseConnexion}
     */
    public DatabaseConnexion $connexion;

    public function __construct()
    {
        $this->connexion = new DatabaseConnexion();
    }

        
    /**
     * register User in Database
     *
     * @param  mixed $user
     * @return void
     */
    public function registerUser(string $user):void
    {
        if (!$this->in_DataBase($user))
        {
            $user = strtolower($user);
            $statement = $this->connexion->getConnection()->prepare(
            'INSERT INTO `t_users`(`user_name`,`creation_date`) VALUES(?, now())');
            $statement->execute([$user]);
        }
    }
        
            
    /**
     * getScore of user
     *
     * @param  mixed $user
     * @return int
     */
    public function getScore(string $user):?int
    {
        $statement = $this->connexion->getConnection()->prepare(
            'SELECT score
            FROM `t_users`
            WHERE `user_name`= ?');
        $statement->execute([$user]);
        $row = $statement->fetch();
        
        return $row['score'] ?? null;
    }
        
    
    /**
     * Update score in Database
     *
     * @param  mixed $user
     * @param  mixed $score
     * @return void
     */
    public function addScore(string $user, int $score):void
    {
        $statement = $this->connexion->getConnection()->prepare(
            'UPDATE `t_users`
            SET `score` = ?
            WHERE `user_name`= ?');
        $statement->execute([$score, $user]);
    }
    
       
    /**
     * get all users in database
     *
     * @return array
     */
    public function getUsers(int $offset):array
    {
        $query = 'SELECT * FROM `t_users` 
                    ORDER BY `score` DESC
                    LIMIT '. Pagination::LIMIT.' OFFSET '. $offset;
        
        $statement = $this->connexion->getConnection()->prepare($query);
        
        $statement->execute();
        $rows = [];
        while(($row = $statement->fetch())){
            $user = [];
            $user['user_name'] = $row['user_name'];
            $user['score'] = $row['score'];
            $user['creation_date'] = $row['creation_date'];
            $rows[] = $user;
        }
        
        return $rows;
    }
    
    
    /**
     * Check if user is in database
     *
     * @param  mixed $user
     * @return bool
     */
    public function in_DataBase(string $user):bool
    {
        $statement = $this->connexion->getConnection()->prepare(
            'SELECT score FROM `t_users`WHERE `user_name`= ?');

        $statement->execute([$user]);
        $row = $statement->fetch();

        return !empty($row);
    }

    public function countPage () : int 
    {
        $statement = $this->connexion->getConnection()->prepare('SELECT count(id) as count FROM `t_users`');
        $statement->execute(); 
        $pages = (int) $statement->fetch()['count'];
        return ceil($pages/Pagination::LIMIT);
    }

    
}
