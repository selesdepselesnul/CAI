<?php
class Admin extends DB\SQL\Mapper {
	public function __construct($db) {
		parent::__construct($db, 'admins');
		$this->load(['username = ?', 'root']);
	}
}