<?php
/**
 *@author : Moch Deden (https://github.com/selesdepselesnul)
 */
class RootController {

    public function __construct() {
        $this->f3 = Base::instance();
    }

    private function indexOrElse($func) {
        if ($this->f3->get('COOKIE["isLoggin"]') == 'true')
            echo \Template::instance()->render('index.html');
        else
            $func();
    }

    public function index() {
        $this->indexOrElse(function() {
            $this->f3->reroute('login/');
        });    

    }


    public function login() {
        $this->indexOrElse(function() {
            echo \Template::instance()->render('login.html');
        });
        
    }

    public function postLogin() {
        
        $db = new DB\SQL(
            $this->f3->get('db.dns'),
            $this->f3->get('db.user'),
            $this->f3->get('db.password')
            );
        
        $admin = new Admin($db);
        $username = $this->f3->get('POST["username"]');
        $password = $this->f3->get('POST["password"]');
        $isRemembered = $this->f3->get('POST["rememberCheckbox"]');
        $auth = new \Auth($admin, ['id'=>'username', 'pw'=>'password']);
        
        
        if($auth->login($username, $password)) {
            if ($isRemembered == "on")
                setcookie('isLoggin', 'true');
            $this->f3->reroute('/');
        } 
    }
}
