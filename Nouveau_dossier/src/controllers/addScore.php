<?php
namespace Application\src\controlleurs\addScore;

require_once('./src/model/database.php');
use Application\src\model\database\DataBase;

class AddScore
{
    public function execute(string $user_name, string $score):void
    {
        $score = (int) $score + DataBase::getScore($user_name);
        DataBase::addScore($user_name, $score);
    }
}