<?php 
namespace App\controllers;

use App\model\DataBase;

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
        $users = DataBase::getUsers();   
        require('./templates/admin/dashboard.php');
    }
}