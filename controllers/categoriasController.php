<?php
/**
 * Clase de Categoria Controller que extiende de AppController
 *
 * @package PDO
 * @author Miguel Angel <mikehernandezcruz@gmail.com>
 */

class categoriasController extends AppController

{

	protected $categoria;

	public function __construct(){
		parent::__construct();
		$this->categoria = new classPDO();

	}
/**
 * Metodo para el index obteniendo el titulo de la vista
 * Obtener listado de las categorias 
 * vista para redireccionar a la vista.
 */
	public function index(){

		$this->_view->titulo = "Listado de categoria";
		$this->_view->categorias = $this->categoria->find('categorias', 'all');
        $this->_view->setLayout('default');
        $this->_view->renderizar('index');

		
	}
	/**
	 * Metodo para editar 
	 * $id de la tabla categoria 
	 */

	public function edit($id = NULL){
	if ($_POST){
			if($this->categoria->update('categorias', $_POST)){
	           $this->redirect(
	      	          array('controller'=>'categorias','action'=>'index'
	      	          	)

	      	        );
        }else{
        	$this->redirect(
        	          array(
        	                'controller'=>'categorias',
        	                'action'=>'edit/'.$_POST['id']
        	               )
        	          );
                }

        }else{

		$conditions = array(
			      'conditions'=>'id='.$id);
		$this->_view->categoria=$this->categoria->find(
			'categorias',
			'first',
			$conditions
		);

		$this->_view->titulo="Editar categoria";
		$this->_view->renderizar('edit');


	}
}
/**
 * Metodo para inserta a la tabla categoria 
 * se obtiene el metodo save para guarda en categorias
 * redireccionar al index
 */
public function add(){
		if($_POST){
			if($this->categoria->save("categorias", $_POST)){
				$this->redirect(array(
					"controller"=>"categorias"
				));
        }else{$this->redirect(
        	                  array(
        	                  	'controller'=>'categorias','action'=>'add'
        	               )
        	          );
    }
		}else{

			$this->_view->titulo="Agregar categoria";
			$this->_view->renderizar=("add");


		}
		$this->_view->renderizar('add');

	  }
/**
 * Metodo para Eliminar categorias
 * @	
 */

    public function delete($id){
	$condition='id='.$id;
	if ($this->categoria->delete('categorias', $condition)) {
		$this->redirect(array('controller'=>'categorias'));
	  }
   }

}
