<?php

namespace App\lib;

class DatabaseConnexion
{
    public ?\PDO $database = null;

    public  function getConnection(): \PDO
    {
        if ($this->database === null) {
            $this->database = new \PDO('mysql:host=localhost;dbname=db_game;charset=utf8', 'root', '');
        }

        return $this->database;
    }
}

