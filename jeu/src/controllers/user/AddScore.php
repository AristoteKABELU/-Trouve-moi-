<?php
namespace App\controllers\user;

use App\model\User;

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
        $user = new User();
        $score = (int) $score + $user->getScore($user_name);
        $user->addScore($user_name, $score);
    }
}