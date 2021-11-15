<?php 
if(isset($_SESSION['id']) and isset($_SESSION['user'])){

	include("logoController.php");
	include("footerController.php");

	$tpl->session_id = $_SESSION['id'];
	$tpl->user = $_SESSION['user'];
	$tpl->get = 'adm-servicios';

	$tpl->fetch("private/adm-servicios-crear.php");
	exit;

}else{
	header("Location: http://localhost/cms/index/");
}

?>