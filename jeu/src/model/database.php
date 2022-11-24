<?php

    namespace Application\src\model\DataBase;
    
    class DataBase
    {
        static ?\PDO $database = null;

        public static function getConnection(): \PDO
        {
            if (self::$database === null) {
                self::$database = new \PDO('mysql:host=localhost;dbname=db_game;charset=utf8', 'root', '');
            }

            return self::$database;
        }

        public static function registerUser(string $user):void
        {
            $user = strtolower($user);
            $statement = self::getConnection()->prepare(
                'INSERT INTO `t_users`(`user_name`,`creation_date`) VALUES(?, now())');
            $statement->execute([$user]);
        }

        public static function getScore(string $user):int
        {
            $statement = self::getConnection()->prepare(
                'SELECT score
                FROM `t_users`
                WHERE `user_name`= ?');
            $statement->execute([$user]);
            $row = $statement->fetch();
            
            return $row['score'];
        }

        public static function addScore(string $user, int $score):void
        {
            $statement = self::getConnection()->prepare(
                'UPDATE `t_users`
                SET `score` = ?
                WHERE `user_name`= ?');
            $statement->execute([$score, $user]);
        }

        public static function getUsers():array
        {
            $statement = self::getConnection()->prepare(
                'SELECT * FROM `t_users` ORDER BY `score` DESC');
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

        public static function in_DataBase(string $user):bool
        {
            $statement = self::getConnection()->prepare(
                'SELECT score FROM `t_users`WHERE `user_name`= ?');

            $statement->execute([$user]);
            $row = $statement->fetch();

            return !empty($row);
        }

        public static function delete_user(string $user):void
        {
            $statement = self::getConnection()->prepare(
                'DELETE FROM `t_users` WHERE `user_name` = ?');
            $statement->execute([$user]);
        }

    }

?>
