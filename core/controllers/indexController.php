<?php 

$db = new Conexion();

$sql = $db->query("SELECT titulo,contenido FROM inicio WHERE id=1");

$datos = $db->recorrer($sql);

$tpl = new TemplateEngine();

include("logoController.php");
include("footerController.php");

$tpl->titulo = $datos['titulo'];
$tpl->contenido = $datos['contenido'];
if(isset($_SESSION['id']) and isset($_SESSION['user'])){
	$tpl->session_id = $_SESSION['id'];
}


$tpl->get = 'index';
$db->liberar($sql);
$db->close();
$tpl->fetch('home/index.php');

?>