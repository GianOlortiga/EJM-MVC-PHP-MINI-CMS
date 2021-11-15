<?php 
if(isset($_SESSION['id']) and isset($_SESSION['user'])){

	if($_POST){
		require("core/models/class.Actualizar.php");
		$actfooter = new Actualizar();
		$actfooter->ActFooter();
		
	}else{
		$db = new Conexion();
		$tpl = new TemplateEngine();

		include("logoController.php");
		include("footerController.php");

		$sql = $db->query("SELECT contenido FROM estructura WHERE elemento='footer'");

		$datos=$db->recorrer($sql);

		$tpl->footer = $datos['contenido'];

		$tpl->session_id = $_SESSION['id'];
		$tpl->user = $_SESSION['user'];
		$tpl->get = 'adm-footer';
		if(isset($_GET['estado']) && $_GET['estado'] == 'success'){
			$tpl->estado = 'success';
		}else if(isset($_GET['estado']) && $_GET['estado'] == 'error'){
			$tpl->estado = 'error';
		}
		$db->close();
		$tpl->fetch("private/adm-footer.php");
	}

}else{
	header("Location: ../../index/");
}

?>