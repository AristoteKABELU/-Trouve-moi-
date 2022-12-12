<?php 
namespace App\controllers\admin;

use App\model\DataBase;
use App\model\User;

class Dashboard
{    
    /**
     * display the dashboard of our siteweb
     * execute
     *
     * @return void
     */
    public function execute()
    {
        $dashboard = 1;
        $users = new User;
        $users = $users->getUsers();
        
        require('./templates/admin/dashboard.php');
    }
}