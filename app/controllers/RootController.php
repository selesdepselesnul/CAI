<?php
/**
 *@author : Moch Deden (https://github.com/selesdepselesnul)
 */
class RootController {

    public function __construct() {
        $this->f3 = Base::instance();
    }

    private function renderIndexOrElse($run) {
        if ($this->f3->get('COOKIE["isLoggin"]') == 'true')
            echo \Template::instance()->render('index.html');
        else
            $run();
    }

    public function getIndex() {
        $this->renderIndexOrElse(function() {
            $this->f3->reroute('@get_login');
        });    
    }

    public function getLogin() {
        $this->renderIndexOrElse(function() {
            echo \Template::instance()->render('login.html');
        });
    }

    public function getItems() {
        echo json_encode(Item::all());
    }

    public function getLogout() {
        if($this->f3->get('COOKIE[isLoggin]') == 'true')
            setcookie ("isLoggin", "", time() - 3600);
        $this->f3->reroute('@get_login');
    }

    public function postLogin() {
        $admin = new Admin($this->f3->get('DB'));

        $username = $this->f3->get('POST["username"]');
        $password = $this->f3->get('POST["password"]');
        $isRemembered = $this->f3->get('POST["rememberCheckbox"]');
        $auth = new \Auth($admin, ['id'=>'username', 'pw'=>'password']);

        if($auth->login($username, $password)) {
           if ($isRemembered == "on")
               setcookie('isLoggin', 'true');
           $this->f3->reroute('@get_index');
        } else {
           echo "salah boy!";
        }
    }
}
