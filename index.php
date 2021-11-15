<?php 
session_start();

if(isset($_GET['view'])){
	$view = $_GET['view'];
}else{
	header("Location: index/");
}

require('TemplateEngine.class.php');
require('core/models/class.Conexion.php');

if(isset($_GET['admin'])){
	$admin = $_GET['admin'];
	
	if(file_exists('core/controllers/adm-'.$admin.'Controller.php')){

	include ('core/controllers/adm-'.$admin.'Controller.php');
	}else{
		
		include('core/controllers/adminController.php');
	}
	
}else{

	if(file_exists('core/controllers/'.$view.'Controller.php')){

		include ('core/controllers/'.$view.'Controller.php');
	}else{
		
		include('core/controllers/indexController.php');
	}
}
echo 'Memoria usada: '. memory_get_usage() / 1024 . 'kb';
?>