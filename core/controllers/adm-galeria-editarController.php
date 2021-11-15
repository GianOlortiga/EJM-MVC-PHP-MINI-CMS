<?php 
if(isset($_SESSION['id']) and isset($_SESSION['user'])){

	if(isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id']>0){
		$id_get = intval($_GET['id']);

		$sql_id = $db->query("SELECT * FROM galeria WHERE id='$id_get'");

		$datos_id = $db->recorrer($sql_id);

		$tpl->id_galery = $datos_id['id'];
		$tpl->img = $datos_id['imagen'];

		include("logoController.php");
		include("footerController.php");

		$tpl->session_id = $_SESSION['id'];
		$tpl->user = $_SESSION['user'];
		$tpl->get = 'adm-galeria';

		$tpl->fetch("private/adm-galeria-editar.php");
		exit;
	}else{
		header("Location http://localhost/cms/admin/galeria/");
	}

}else{
	header("Location: http://localhost/cms/index/");
}

?>