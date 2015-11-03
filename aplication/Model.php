<?php

/**
 * Clase que AppModelo
 * 
 *
 * @package framework
 * @author Miguel Angel <mikehernandezcruz@gmail.com>
 */
class AppModel
{
	protected $_db;

	public function __construct(){
		$this->_db = new Database();
	}
}

