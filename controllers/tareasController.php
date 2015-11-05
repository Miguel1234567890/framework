<?php
/**
 * Clase Tareas Controller que extiende de AppController
 *
 * @package Framework
 * @author Miguel Angel <mikehernandezcruz@gmail.com>
 */

class tareasController extends AppController
{
	/**
	 * Metodo para ejecuta el constructor del padre AppController 
	 */
	protected $tarea;
	public function __construct(){
		parent::__construct();
		$this->tarea = new classPDO();
	}

	/**
      * Metodo ejecuta el index las tareas
      * @return string vista 
      */

	public function index(){
		$this->_view->titulo = "Listado de tareas";

		//$this->_view->tareas = $this->db->find('tareas', 'all');
		$conditions = array('conditions'=>'categorias.id=tareas.categoria_id order by tareas.id');

		$this->_view->tareas=$this->tarea->find('tareas,categorias','all',$conditions );
		$this->_view->renderizar('index');
		//$tareas = $this->loadmodel("tarea");
		//$this->_view->tareas = $tareas->getTareas();
		// TITULO QUE SE VISUALZARA EN LA URL.
		//$this->_view->renderizar("index");

	}

	/**
      * Metodo edit para editar registro de las tareas  
      * @param  int $id resive la id de las tareas a editar 
      * @return string  vista.
      */

	public function edit($id = NULL){
	if ($_POST){
			if($this->tarea->update('tareas', $_POST)){
	           $this->redirect(
	      	          array('controller'=>'tareas','action'=>'index'
	      	          	)
	      	        );
        }else{
        	$this->redirect(
        	          array(
        	                'controller'=>'tareas',
        	                'action'=>'edit/'.$_POST['id']
        	               )
        	          );
                }

        }else{

		$conditions = array(
			      'conditions'=>'id='.$id);
		$this->_view->tarea=$this->tarea->find(
			'tareas',
			'first',
			$conditions
		);

		$conditions =array('order'=>'nombre asc' );

		$this->_view->categoria = $this->tarea->find('categorias', 'all', $conditions);
		$this->_view->titulo="Editar Tarea";
		$this->_view->renderizar('edit');


	}
}
/**
    * Metodo add para agregar tarea
    * @return string  vista agregar tarea 
    * 
    * 
    */
public function add(){
		if ($_POST){
			if($this->tarea->save('tareas',$_POST)){
	           $this->redirect(
	      	          array('controller'=>'tareas','action'=>'index'
	      	          	)
	      	        );
        }else{$this->redirect(
        	                  array(
        	                  	'controller'=>'tareas','action'=>'add'
        	               )
        	          );
    }
		}else{
			/**
			 * Sirve para Llenar los input de en la vista y poder visualizar 
			 */
			$conditions =array('order'=>'nombre asc' );

			$this->_view->categoria = $this->db->find('categorias', 'all', $conditions);
			$this->_view->titulo="Agregar tarea";
			$this->_view->renderizar=("add");


		}
		$this->_view->renderizar('add');

	  }
	  /**
        * Delete metodo para eliminar registros de tareas 
        * @param  int  $id indetificador de tareas a eliminar 
        * function delete(){
        * 
        */

    public function delete($id){
	$condition='id='.$id;
	if ($this->categoria->delete('tareas', $condition)) {
		$this->redirect(array('controller'=>'tareas'));
	  }
   }

}
