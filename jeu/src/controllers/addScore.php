<?php
namespace App\controllers;

use App\model\Database;

class AddScore
{
    public function execute(string $user_name, string $score):void
    {
        $score = (int) $score + DataBase::getScore($user_name);
        DataBase::addScore($user_name, $score);
    }
}