<?php 
namespace App\controllers\admin;

use App\model\Admin;
use App\model\User;
use App\otherClass\Pagination;

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
            if (Admin::VerifyPassword($input['admin_name'], $input['password_admin'])) {
                $_SESSION['admin_name'] = $input['admin_name'];   
        
                $page =  $input_page['p'] ?? 1;
                $offset = Pagination::offset($page);
                $pages = (new User)->countPage();
                $users = (new User)->getUsers($offset);
                
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