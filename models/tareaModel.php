<?php

class TareaModel extends AppModel
{

	/**
	 * 
	 * @author Miguel Hernandez 
    */	
	public function __construct(){
		parent::__construct();
	}

    /**
	 *  Metodo para Obtener las tareas existentes 
	 * @author Miguel Hernandez 
    */

	public function getTareas(){
		/**
		 * Consulta para obtener las tareas existente en la base de datos 
		 */
		$tareas = $this->_db->query("SELECT * FROM tareas");
		
		return $tareas->fetchall();
	}
}
