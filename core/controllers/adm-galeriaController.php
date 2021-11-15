<?php 
if(isset($_SESSION['id']) and isset($_SESSION['user'])){
		
	if(isset($_POST['submit-subir'])){
		require("core/models/class.Galery.php");
		$subir = new Galery();
		$subir-> SubirImgs();
		
	}if(isset($_POST['submit-editar'])){
		require("core/models/class.Galery.php");
		$actualizar = new Galery();
		$actualizar-> ActImg();
		
	}if(isset($_POST['submit-delete'])){
		require("core/models/class.Galery.php");
		$eliminar = new Galery();
		$eliminar-> ElimImg();
		
	}else{
		$db = new Conexion();
		$tpl = new TemplateEngine();

		include("logoController.php");
		include("footerController.php");

		$sql = $db->query("SELECT * FROM galeria order by id desc");

		while($x = $db->recorrer($sql)){
			$datos[]= array(
				'id'=>$x['id'],
				'imagen'=>$x['imagen'] 
				);
			}
		$tpl->imgs = $datos;


		$tpl->session_id = $_SESSION['id'];
		$tpl->user = $_SESSION['user'];
		$tpl->get = 'adm-galeria';


		if(isset($_GET['estado']) && $_GET['estado'] == 'success'){
			$tpl->estado = 'success';
		}else if(isset($_GET['estado']) && $_GET['estado'] == 'errortipo'){
			$tpl->estado = 'errortipo';
		}
		else if(isset($_GET['estado']) && $_GET['estado'] == 'errorvacio'){
			$tpl->estado = 'errorvacio';
		}
		else if(isset($_GET['estado']) && $_GET['estado'] == 'errorna'){
			$tpl->estado = 'errorna';
		}

		if(isset($_GET['accion']) && $_GET['accion'] == 'editar'){
			include("adm-galeria-editarController.php");
		}
		$db->liberar($sql);
		$db->close();
		$tpl->fetch("private/adm-galeria.php");
	}

}else{
	header("Location: ../../index/");
}

?>