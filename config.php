<?php
	
	define('INCLUDE_PATH','http://localhost/Back-End/forum/');

	//Constantes banco de dados
	define('HOST','localhost');
	define('DATABASE','forum');
	define('USER','root');
	define('PASSWORD','');

	$autoload = function($class){
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);
?>