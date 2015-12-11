<?php
/**
 *@author : Moch Deden (https://github.com/selesdepselesnul)
 */
class RootController
{
    public function __construct()
    {
        $this->f3 = Base::instance();
    }

    public function index()
    {
        
        echo "index page";
        // if ($this->f3->get('COOKIE["isLoggin"]') == 'no')
        //     $this->f3->reroute('login/');
    }

    public function login()
    {
        echo \Template::instance()->render('login.htm');
    }

    public function postLogin()
    {
        $db = new DB\SQL(
            $this->f3->get('db.dns'),
            $this->f3->get('db.user'),
            $this->f3->get('db.password')
        );
        
        $admin = new Admin($db);
        $username = $this->f3->get('POST["username"]');
        $password = $this->f3->get('POST["password"]');

        if($admin->password == $password)
            $this->f3->reroute('/');
        
    }
}
