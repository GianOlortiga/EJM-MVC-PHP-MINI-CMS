<?php 

$db = new Conexion();

$sql = $db->query("SELECT * FROM galeria");


$tpl = new TemplateEngine();

include("logoController.php");
include("footerController.php");

while($x = $db->recorrer($sql)){
	$datos[]= array(
		'imagen' => $x['imagen']
		);
}
$tpl->galeria = $datos;
if(isset($_SESSION['id']) and isset($_SESSION['user'])){
	$tpl->session_id = $_SESSION['id'];
}
$tpl->get = 'galeria';
$db->liberar($sql);
$db->close();
$tpl->fetch('public/galeria.php');

?>