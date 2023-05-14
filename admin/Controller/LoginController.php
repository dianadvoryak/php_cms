<?php

namespace Admin\Controller;

use Engine\Controller;
use Engine\DI\DI;
use Engine\Core\Auth\Auth;
use Engine\Core\Database\QueryBuilder;

class LoginController extends Controller
{
    protected $auth;

    public function __construct(DI $di)
    {
        parent::__construct($di);

        $this->auth = new Auth();

        if($this->auth->hashUser() !== null){
            // redirect
            header('Location: /admin/', true, 301);
            exit;
        }
    }

    public function form()
    {
        $this->view->render('login');
    }

    public function authAdmin()
    {
        $params = $this->request->post;
        $queryBuilder = new QueryBuilder();

        $query = $this->db->query('
            select * 
            from cms.user 
            where email = "' . $params['email'] . '" 
            and password = "' . md5($params['password']) . '" limit 1;');

        if(!empty($query)){
            $user = $query[0];

            if($user['role'] == 'admin'){
                $hash = md5($user['id'] . $user['email'] . $user['password'] . $this->auth->salt());

                $this->db->execute('
                    update user 
                    set hash = "' . $hash . '"
                    where id = ' . $user['id'] . '
                ');

                $this->auth->authorize($hash);

                header('Location: /admin/login/', true, 301);
                exit;
            }
        }
    }
}

