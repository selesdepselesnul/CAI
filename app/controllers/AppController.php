<?php
class AppController {

	private function render($view) {
		Base::instance()->set('content', $view);
		echo \Template::instance()->render('layout.html');	
	}

	public function getInventory($f3) {
		Base::Instance()->set('content', 'inventory.html');
		echo \Template::instance()->render('layout.html');
	}

	public function getHome($f3) {
		$this->renderIndexOrElse(function() {
			Base::Instance()->reroute('@get_login');
		});    
	}

	public function getCashier($f3) {
		Base::Instance()->set('content', 'cashier.html');
		echo \Template::instance()->render('layout.html');
	}

	private function renderIndexOrElse($run) {
		Base::Instance()->set('content', 'home.html');
		if (Base::Instance()->get('COOKIE["isLoggin"]') == 'true')
			echo \Template::instance()->render('layout.html');
		else
			$run();
	}

	public function getLogin() {
		$this->renderIndexOrElse(function() {
			echo \Template::instance()->render('login.html');
		});
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
			Base::Instance()->reroute('@get_home');
		} else {
			echo "Salah boy!";
		}
	}
}