<?php 

if($_POST){
	include("core/models/class.sendEmail.php");
	$send = new SendEmail();
	$send->Enviar();
}
$db = new Conexion();

$tpl = new TemplateEngine();

include("logoController.php");
include("footerController.php");

$sql = $db->query("SELECT mapa FROM contacto WHERE elemento='contactos'");

$datos = $db->recorrer($sql);

if(isset($_SESSION['id']) and isset($_SESSION['user'])){
$tpl->session_id = $_SESSION['id'];
}
$tpl->mapa = stripslashes(html_entity_decode($datos['mapa']));
$tpl->get = 'contactos';
$db->close();
$tpl->fetch('public/contactos.php');

?>