<?php

namespace App\otherClass;

class Session
{    
       
    /**
     * initialised a session with him time to live
     *
     * @param  mixed $timeToLive
     * @return void
     */
    public static function init_session (int $timeToLive = 0) : void
    {
        if(!session_id()){
            session_set_cookie_params($timeToLive);
            session_start();
            session_regenerate_id();
        }
    }
    
    /**
     * clear a current session
     *
     * @return void
     */
    public static function clear_session () : void
    {
        session_unset();
        session_destroy();
    }
}