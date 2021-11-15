<?php 

$db = new Conexion();

$sql = $db->query("SELECT titulo,contenido,img FROM acerca WHERE id=1");

$datos = $db->recorrer($sql);

$tpl = new TemplateEngine();

include("logoController.php");
include("footerController.php");

$tpl->titulo = $datos['titulo'];
$tpl->contenido = $datos['contenido'];
$tpl->imagen = $datos['img'];
if(isset($_SESSION['id']) and isset($_SESSION['user'])){
	$tpl->session_id = $_SESSION['id'];
}
$tpl->get = 'acerca';
$db->liberar($sql);
$db->close();
$tpl->fetch('public/acerca.php');

?>