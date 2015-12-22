<?php
/**
 *@author Moch Deden (https://github.com/selesdepselesnul)
 */
class Admin extends DB\SQL\Mapper {
	public function __construct($db) {
		parent::__construct($db, 'Admin');
	}
}