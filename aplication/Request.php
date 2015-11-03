<?php
/**
 * Clase Request servira recibir las peticiones.
 * function getControlador
 * function getMetodo
 * function getArgs
 * 
 * @package Framework
 * @author Miguel Angel <mikehernandezcruz@gmail.com>
 */


class Request{

	private $_controlador;
	private $_metodo;
	private $_argumentos;

	/**
	 * Metodo para inicializar los filtrados de URL
	 */

	public function __construct(){
		if(isset($_GET['url'])){
			$url=filter_input(INPUT_GET,'url',FILTER_SANITIZE_URL);
			$url=explode("/",$url);
			$url=array_filter($url);

			$this->_controlador=strtolower(array_shift($url));
			$this->_metodo=strtolower(array_shift($url));
			$this->_argumentos=$url;
		}
		if(!$this->_controlador){
			$this->_controlador= DEFAULT_CONTROLLER;
		}
		if (!$this->_metodo) {
			 $this->_metodo = "index";
		}
		if (!$this->_argumentos) {
			 $this->_argumentos = array();
		}
	}

	/**
 * Metodo getControlador para obtener el controlador 
 * @return _controlador
 */

	public function getControlador(){
		return $this->_controlador;
	}
	/**
 * Medoto getMetodo Permitira traer el metodo 
 * @return _metodo
 */

	public function getMetodo(){
		return $this->_metodo;
	}

	/**
 * getArgs argumetos que se usaran para dirigirce alos metodos
 * @return _argumentos
 */

	public function getArgs(){
		return $this->_argumentos;
	}
}