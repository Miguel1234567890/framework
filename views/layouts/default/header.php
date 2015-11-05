<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport"    content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">

		<title>Frameword MVC<?php if(isset($this->titulo)) { echo $this->titulo; } ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo $_layoutParams["ruta_css"]; ?>bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $_layoutParams["ruta_css"]; ?>magister.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $_layoutParams["ruta_js"]; ?>magister.js">
		<link rel="stylesheet" type="text/css" href="<?php echo $_layoutParams["ruta_js"]; ?>modernizr.custom.72241.js">
		<link rel="stylesheet" type="text/css" href="<?php echo $_layoutParams["ruta_img"]; ?>body4.jpg">
		<link rel="shortcut icon" href="<?php echo $_layoutParams["ruta_img"]; ?>gt_favicon.png">
        <link href='http://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css'>



	</head>
	<body class="theme-invert" >
		<nav class="mainmenu">
			<div class="container">
				<div class="dropdown open">
					<button type="button" class="navbar-toggle" data-toggle="dropdown">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
						</button>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
				        <li><a href="<?php echo APP_URL;?>Tareas">Tareas</a></li>
				        <li><a href="<?php echo APP_URL;?>Usuarios">Usuarios</a></li>
						<li><a href="<?php echo APP_URL;?>Categorias">Categorias</a></li>
				        <li><a href="<?php echo APP_URL;?>Usuarios/logout">Salir</a></li>
					</ul>
				</div>
		</div>
	</nav>
