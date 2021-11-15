<?php 

if(isset($_SESSION['id']) and isset($_SESSION['user'])){
	$db = new Conexion();
	$tpl = new TemplateEngine();

	include("logoController.php");
	include("footerController.php");

	$tpl->session_id = $_SESSION['id'];
	$tpl->user = $_SESSION['user'];
	$tpl->get = 'admin';
	$tpl->fetch("private/admin.php");
}else{
	header("Location: ../login/");
}

 ?>