<?php
/**
 * :: operaradores de ambito en php
 * Clase Usuarios Controller que extiende de AppController
 *
 * @package framework
 * @author Miguel Angel <mikehernandezcruz@gmail.com>
 */

class usuariosController extends AppController{
	/**
	 * Metodo para ejecuta el constructor del padre AppController 
	 */
	protected $usuario;
	public function __construct(){
		parent::__construct();
		$this->usuario = new classPDO();
	}

	/**
      * Metodo ejecuta el index de los usuarios
      * y obtines los valores de la base de datos para llenar el formulario.
      * @return string vista 
      */

public function index(){
		$this->_view->titulo = "Listado de usuarios";
		$this->_view->usuarios= $this->usuario->find('usuarios', 'all');
		$this->_view->setLayout('default');
		$this->_view->renderizar('index');
}
     /**
	 * Metodo para editar loas datos de los usuarios
	 * @param  int $id recibe la id de los usuarios.
     * @return string  vista.
     */
public function edit($id = null){
	
		if ($_POST){
			if (!empty($_POST['pass'])) {
				$pass = new Password();
				$_POST['password'] = $pass->getPassword($_POST['pass']);;
			}
			if ($this->usuario->update("usuarios", $_POST)) {
				$this->redirect(array('controller'=>'usuarios', 'action'=>'index'));
			}else{
				$this->redirect(array('controller'=>'usuarios', 'action'=>'edit'));
			}
		}else{
			$this->_view->titulo = "Editar usuario";
			$this->_view->usuario = $this->usuario->find('usuarios', 'first', array('conditions'=>'id='.$id));
			$this->_view->renderizar('edit');
		}

	}


/**
 * M
 */
public function add(){
	/**
	 * con el if podremos validar que tenga valores post para hacer el proceso de incriptacion de contraseña
	 */
		if ($_POST){
			$pass = new Password();

			$_POST['password'] = $pass->getPassword($_POST['password']);

			if ($this->usuario->save("usuarios", $_POST)) {
				$this->redirect(array('controller'=>'usuarios', 'action'=>'index'));
			}else{
				$this->redirect(array('controller'=>'usuarios', 'action'=>'add'));
			}
		}else{
			$this->_view->titulo = "Agregar usuario";
			$this->_view->renderizar('add');
		}


	}
	/**
 * Metodo para Eliminar usuario
 * @	
 */
public function delete($id = null){
		$conditions = 'id='.$id;
		if ($this->usuario->delete('usuarios', $conditions)) {
			$this->redirect(
					array(
						'controller'=>'usuarios',
						'action'=>'index'
					)
			);
		}
	}
/**
 * Metodo para el Logueo
 * instanciando la clase Password para hacer uso de metodos de filtrado
 * instanciando la clase Validations para hacer uso de metodos y validar los tipos de datos.
 * instanciando la clase Autorization para hacer de sus fuciones y dar acceso al sistema.
 * Todo esto para evitar la inyeccion de codigos.
 */

public function login(){
      if($_POST){
			$pass = new Password();
			$filter = new Validations();
			$auth = new Authorization();

			$username = $filter->sanitizeText($_POST["username"]);
			$password = $filter->sanitizeText($_POST["password"]);

			$options['conditions'] = " username = '$username'";
			$usuario = $this->usuario->find("usuarios", "first", $options);

			if($pass->isValid($password, $usuario['password'])){
				$auth->login($usuario);
				$this->redirect(array("controller"=>"tareas"));
			}else{
			echo "Usuario no Valido";
		}
	}
    $this->_view->setLayout('login');
	$this->_view->renderizar('login');

}
/**
 * Metodo para destruir la sesion.
 */

public function logout(){
	/**
	 * Se instancia la clase Autorization para hacer usos de us metodos.
	 */
		$auth = new Authorization();
		$auth->logout();
	}
}
