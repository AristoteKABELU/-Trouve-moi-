<?php 
namespace Application\src\controllers\dashboard;

require_once('./src/model/database.php');
use Application\src\model\database\DataBase;

class Dashboard
{
    public function execute()
    {
        $dashboard = 1;
        $users = DataBase::getUsers();   
        require('./templates/admin/dashboard.php');
    }
}