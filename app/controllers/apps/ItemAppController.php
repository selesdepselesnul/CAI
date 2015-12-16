<?php
class ItemAppController {
	public function getSubmitForm($f3) {
		echo \Template::instance()->render('itemsubmitingform.html');
	}
}