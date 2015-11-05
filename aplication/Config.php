<?php
/**
 * se define las carpetas y archivos que se van a utilzar en el framework
 * se define los valores para accesar a la base de datos
 * se define el nombre del proyecto
 */

define("DEFAULT_CONTROLLER", "tareas");
define("DEFAULT_LAYOUT", "default");

define("APP_FOLDER", "framework");
define("APP_URL", "http://".$_SERVER['SERVER_NAME']."/".APP_FOLDER."/");

define("APP_URL_CSS", APP_URL."public/css/");
define("APP_URL_IMG", APP_URL."public/img/");
define("APP_URL_JS",  APP_URL."public/js/");

define("APP_NAME", "Framework");

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "gestion");
define("DB_CHAR", "UTF8");
?>