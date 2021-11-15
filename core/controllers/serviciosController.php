<?php 

$db = new Conexion();

$sql = $db->query("SELECT titulo,contenido,img FROM servicios");


$tpl = new TemplateEngine();

include("logoController.php");
include("footerController.php");

while($x = $db->recorrer($sql)){
	$datos[]= array(
		'titulo' => $x['titulo'],
		'contenido'=>$x['contenido'],
		'img'=>$x['img'] 
		);
}
$tpl->servis = $datos;
if(isset($_SESSION['id']) and isset($_SESSION['user'])){
	$tpl->session_id = $_SESSION['id'];
}
$tpl->get = 'servicios';
$db->liberar($sql);
if(isset($_GET['estado']) && $_GET['estado'] == 'success'){
			$tpl->estado = 'success';
		}else if(isset($_GET['estado']) && $_GET['estado'] == 'error'){
			$tpl->estado = 'error';
}
$db->close();
$tpl->fetch('public/servicios.php');

?>