<?php 
namespace App\controllers;

use App\model\DataBase;

class Dashboard
{
    public function execute()
    {
        $dashboard = 1;
        $users = DataBase::getUsers();   
        require('./templates/admin/dashboard.php');
    }
}