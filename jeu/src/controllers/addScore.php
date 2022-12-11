<?php
namespace App\controllers;

use App\model\Database;

class AddScore
{    
    /**
     * Add a score for Player into Database
     *
     * @param  mixed $user_name
     * @param  mixed $score
     * @return void
     */
    public function execute(string $user_name, string $score):void
    {
        $score = (int) $score + DataBase::getScore($user_name);
        DataBase::addScore($user_name, $score);
    }
}