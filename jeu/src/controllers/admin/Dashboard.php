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
    public function execute(array $input) : void
    {
        if (isset($input['admin_name'], $input['password_admin'])) {
            if (($input['admin_name'] == 'Admin' && $input['password_admin'] == 'Admin'))  {
                $_SESSION['admin_name'] = $input['admin_name'];   
                //Allow to show a delete option in [.templates\scores.php]
                $dashboard = 1;
                $users = new User;
                $users = $users->getUsers();

                require('./templates/admin/dashboard.php');
            }else{
                $notAllowed = true;
                require('./templates/admin/login.php');

            }
        } else {
            require('./templates/admin/login.php');
        }
    }
}