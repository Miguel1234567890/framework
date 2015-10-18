<?php

/**
*
* Class Password
* Clase para el manejo de Contraseña
*
* @author Miguel Angel 
* @version 1.0 Primera version estbale
* @package Seguridad
* @copyright 2015
*
*/
	class Password{
	
	public function __construct(){
			$this->checkBlowfish();
	}
   
	private function checkBlowfish(){
		if (!defined("CRYPT_BLOWFISH") && !CRYPT_BLOWFISH) {
			echo "Algoritmo Blowfish no roportado";
			die();
		}
	}

	public function getPassword($password, $dig = 7){
		$set_salt = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$salt = sprintf('$2a$%02d$', $dig);
		for ($i=0; $i < 22; $i++) { 
			$salt .= $set_salt[mt_rand(0, 22)];
		}

		return crypt($password, $salt);
	}
	/**
	 * Invalid validacion de hash de contraseña
	 * metodo que coprar dos hash de contraseña y regresa falso en caso de no ser 
	 *
	 */

	public function isValid($pass1, $pass2){
		if (crypt($pass1, $pass2) == $pass2) {
			return true;
		}
		
		return false;	
	}
	/**
	 *[passwordVerify verificacion de contraseña]
	 * @param string $ pass1 hash a comparar
	 * @param string $ pass2 hash base
	 * @return boolean 
	 * @since 5.5
	 */

	public function passwordVerify($pass1, $pass2){
		if (password_verify($pass1, $pass2)) {
			return true;
		}
		return false;
	}

}

?>