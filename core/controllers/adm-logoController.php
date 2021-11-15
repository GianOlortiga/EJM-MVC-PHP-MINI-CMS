<?php 
if(isset($_SESSION['id']) and isset($_SESSION['user'])){

	if($_POST){
		require("core/models/class.Actualizar.php");
		$actlogo = new Actualizar();
		$actlogo->Actlogo();
		
	}else{
		$db = new Conexion();
		$tpl = new TemplateEngine();

		include("logoController.php");
		include("footerController.php");

		$tpl->session_id = $_SESSION['id'];
		$tpl->user = $_SESSION['user'];
		$tpl->get = 'adm-logo';
		if(isset($_GET['estado']) && $_GET['estado'] == 'success'){
			$tpl->estado = 'success';
		}else if(isset($_GET['estado']) && $_GET['estado'] == 'error'){
			$tpl->estado = 'error';
		}
		$db->close();
		$tpl->fetch("private/adm-logo.php");
	}

}else{
	header("Location: ../../index/");
}
?>