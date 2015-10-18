<?php

class View{
	private $_controlador;

	public function __construct(Request $peticion){
		$this->_controlador = $peticion->getControlador();
	}
	public function renderizar($vista){
		 $rutaView =ROOT.'views'.DS.$this->_controlador.DS.$vista.'.phtml'; 
		 $_layoutParams = array(
		 	'ruta_css'=>app_url.'views/layouts/'.DEFAULT_LAYOUT.'/css/';
		 	'ruta_ima'=>app_url.'views/layouts/'.DEFAULT_LAYOUT.'/ima/';
		 	'ruta_js'=>app_url.'views/layouts/'.DEFAULT_LAYOUT.'/js/';
		 	)
	
		if(is_readable($rutaView)){
			include_once ROOT.'views'.DS.'layouts'.DS.DEFAULT_LAYOUT.DS.'header.php';
			include_once $rutaView;
			include_once ROOT.'views'.DS.'layouts'.DS.DEFAULT_LAYOUT.DS.'footer.php';
			

		}else{
			throw new Exception("Error de Vista");
			
		}
    }
}