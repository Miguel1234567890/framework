<?php

/**
 * Clase para manejar las Vistas 
 * 
 * @package Framework
 * @author Miguel Angel <mikehernandezcruz@gmail.com>
 */
class View{
	private $_controlador;
	private $_metodo;
	private $_layout;

	/**
	 * Metodo para inicializar los metodos.
	 */
public function setLayout($layout){
	$this->_layout = $layout;

}

	public function __construct(Request $peticion){
		$this->_controlador = $peticion->getControlador();
		$this->_metodo = $peticion->getMetodo();
	    $this->_layout = DEFAULT_LAYOUT;
	}
/**
 * Metodo para accesar a las carpetas de las vistas 
 */

	public function renderizar($vista){
		 $_layoutParams = array(
		 	'ruta_css'=>APP_URL.'views/layouts/'.$this->_layout.'/css/',
		 	'ruta_img'=>APP_URL.'views/layouts/'.$this->_layout.'/img/',
		 	'ruta_js'=>APP_URL.'views/layouts/'.$this->_layout.'/js/'
		  	);
		   $rutaView =ROOT.'views'.DS.$this->_controlador.DS.$vista.'.phtml';

		 /*if ($this->_metodo =='login') {
		 	$layout = 'login';
		
		 }else{

		 	$layout = DEFAULT_LAYOUT;
		 }*/
/**
 * Forma de accesar al header y footer de manera mas sofisticada.
 */
		if(is_readable($rutaView)){
			require_once ROOT.'views'.DS.'layouts'.DS.$this->_layout.DS.'header.php';
	        require_once $rutaView;
	        require_once ROOT.'views'.DS.'layouts'.DS.$this->_layout.DS.'footer.php';



		}else{
			/**
			 * En caso de no encontar nada envia este mensaje.
			 */
			throw new Exception("Error de Vista");

		}
    }
}
