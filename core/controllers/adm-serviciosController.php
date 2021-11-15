<?php 
if(isset($_SESSION['id']) and isset($_SESSION['user'])){

	if(isset($_POST['submit-crear'])){
		require("core/models/class.Crear.php");
		$crear = new Crear();
		$crear-> CrearServicio();
		
	}if(isset($_POST['submit-editar'])){
		require("core/models/class.Actualizar.php");
		$actualizar = new Actualizar();
		$actualizar-> ActServicio();
		
	}if(isset($_POST['submit-delete'])){
		require("core/models/class.Eliminar.php");
		$eliminar = new Eliminar();
		$eliminar-> ElimServicio();
		
	}else{
		$db = new Conexion();
		$tpl = new TemplateEngine();

		include("logoController.php");
		include("footerController.php");

		$sql = $db->query("SELECT * FROM servicios");

		while($x = $db->recorrer($sql)){
			$datos[]= array(
				'id'=>$x['id'],
				'titulo' => $x['titulo'],
				'img'=>$x['img'] 
				);
			}
		$tpl->servis = $datos;


		$tpl->session_id = $_SESSION['id'];
		$tpl->user = $_SESSION['user'];
		$tpl->get = 'adm-servicios';


		if(isset($_GET['estado']) && $_GET['estado'] == 'success'){
			$tpl->estado = 'success';
		}else if(isset($_GET['estado']) && $_GET['estado'] == 'error'){
			$tpl->estado = 'error';
		}

		if(isset($_GET['accion']) && $_GET['accion'] == 'crear'){
			include("adm-servicios-crearController.php");
		}else if(isset($_GET['accion']) && $_GET['accion'] == 'editar'){
			include("adm-servicios-editarController.php");
		}
		$db->liberar($sql);
		$db->close();
		$tpl->fetch("private/adm-servicios.php");
	}

}else{
	header("Location: ../../index/");
}

?>