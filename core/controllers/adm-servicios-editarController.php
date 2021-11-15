<?php 
if(isset($_SESSION['id']) and isset($_SESSION['user'])){

	if(isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id']>0){
		$id_get = intval($_GET['id']);

		$sql_id = $db->query("SELECT * FROM servicios WHERE id='$id_get'");

		$datos_id = $db->recorrer($sql_id);

		$tpl->id_servis = $datos_id['id'];
		$tpl->titulo = $datos_id['titulo'];
		$tpl->contenido = $datos_id['contenido'];
		$tpl->img = $datos_id['img'];

		include("logoController.php");
		include("footerController.php");

		$tpl->session_id = $_SESSION['id'];
		$tpl->user = $_SESSION['user'];
		$tpl->get = 'adm-servicios';

		$tpl->fetch("private/adm-servicios-editar.php");
		exit;
	}else{
		header("Location http://localhost/cms/admin/servicios/");
	}

}else{
	header("Location: http://localhost/cms/index/");
}

?>