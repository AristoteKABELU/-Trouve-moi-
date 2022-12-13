<?php 

namespace App\controllers\admin;

use App\otherClass\Session;

class Logout 
{    
    /**
     * Deconnect Admin
     *
     * @return void
     */
    public function execute ()
    {
        Session::clear_session();
        require('./templates/admin/login.php');
    }
}