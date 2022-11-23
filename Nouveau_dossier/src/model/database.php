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
                'SELECT * FROM `t_users`');
            $statement->execute();
            $rows = [];
            while(($row = $statement->fetch())){
                $user = [];
                $user['user_name'] = $row['user_name'];
                $user['score'] = $row['score'];
                $rows[] = $user;
            }
            return $rows;
        }
    }

?>
