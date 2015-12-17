<?php
class ItemAppController {
	public function getSubmitForm($f3) {
		$f3->set('content', 'itemsubmitingform.html');
		echo \Template::instance()->render('layout.html');
	}
}