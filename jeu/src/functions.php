<?php

function init_php_session():void{
    if(!session_id()){
        session_start();
        session_regenerate_id();
    }
}