<?php 
if(isset($_SESSION['id']) and isset($_SESSION['user'])){

	if($_POST){
		require("core/models/class.Actualizar.php");
		$actacerca = new Actualizar();
		$actacerca->ActAcerca();
		
	}else{
		$db = new Conexion();
		$tpl = new TemplateEngine();

		include("logoController.php");
		include("footerController.php");

		$sql = $db->query("SELECT * FROM acerca WHERE id=1");

		$datos=$db->recorrer($sql);

		$tpl->titulo = $datos['titulo'];
		$tpl->contenido = $datos['contenido'];
		$tpl->img = $datos['img'];
		$tpl->session_id = $_SESSION['id'];
		$tpl->user = $_SESSION['user'];
		$tpl->get = 'adm-acerca';
		if(isset($_GET['estado']) && $_GET['estado'] == 'success'){
			$tpl->estado = 'success';
		}else if(isset($_GET['estado']) && $_GET['estado'] == 'error'){
			$tpl->estado = 'error';
		}
		$db->close();
		$tpl->fetch("private/adm-acerca.php");
	}

}else{
	header("Location: ../../index/");
}

?>