<?php
/**
 * Metodo que permite cargar el archivo de manera automatica
 * siempre este sea definido
 */

function __autoload($name){
	require_once(ROOT."libs".DS.$name.".php");
}


?>