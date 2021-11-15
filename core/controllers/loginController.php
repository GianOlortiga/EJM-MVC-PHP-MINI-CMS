<?php 
if(isset($_SESSION['id']) and isset($_SESSION['user'])){
	header("Location: ../admin/");
}else{
	if($_POST){
		include('core/models/class.Acceso.php');
		$acceso = new Acceso();
		$acceso->Login();
		exit;
	}else{
		$db = new Conexion();
		$tpl = new TemplateEngine();

		include("logoController.php");
		include("footerController.php");

		$db->close();
		$tpl->fetch('public/login.php');
	}
}
?>