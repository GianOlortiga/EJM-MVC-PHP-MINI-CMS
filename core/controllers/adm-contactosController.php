<?php 
if(isset($_SESSION['id']) and isset($_SESSION['user'])){

	if($_POST){
		require("core/models/class.Actualizar.php");
		$actcontactos = new Actualizar();
		$actcontactos->ActContactos();
		
	}else{

		$db = new Conexion();
		$tpl = new TemplateEngine();

		include("logoController.php");
		include("footerController.php");

		$sql = $db->query("SELECT * FROM contacto WHERE elemento='contactos'");

		$datos=$db->recorrer($sql);

		$tpl->email = $datos['email'];
		$tpl->mapa = $datos['mapa'];

		$tpl->session_id = $_SESSION['id'];
		$tpl->user = $_SESSION['user'];
		$tpl->get = 'adm-contactos';
		if(isset($_GET['estado']) && $_GET['estado'] == 'success'){
			$tpl->estado = 'success';
		}else if(isset($_GET['estado']) && $_GET['estado'] == 'error'){
			$tpl->estado = 'error';
		}
		$db->close();
		$tpl->fetch("private/adm-contacto.php");
	}

}else{
	header("Location: ../../index/");
}

?>