<?php
/**
 *@author Moch Deden (https://github.com/selesdepselesnul)
 */
class RootController {

    private function renderIndexOrElse($run) {
        if (Base::Instance()->get('COOKIE["isLoggin"]') == 'true')
            echo \Template::instance()->render('index.html');
        else
            $run();
    }

    public function getIndex() {
        $this->renderIndexOrElse(function() {
            Base::Instance()->reroute('@get_login');
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
        if(Base::Instance()->get('COOKIE[isLoggin]') == 'true')
            setcookie ("isLoggin", "", time() - 3600);
        Base::Instance()->reroute('@get_login');
    }

    public function postLogin() {
        $admin = new Admin(Base::Instance()->get('DB'));

        $username = Base::Instance()->get('POST["username"]');
        $password = Base::Instance()->get('POST["password"]');
        $auth = new \Auth($admin, ['id'=>'username', 'pw'=>'password']);

        if($auth->login($username, $password)) {
           setcookie('isLoggin', 'true');
           Base::Instance()->reroute('@get_index');
        } else {
           echo "Salah boy!";
        }
    }
}
