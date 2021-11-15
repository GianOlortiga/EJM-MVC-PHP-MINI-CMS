<?php 
$sql_logo = $db->query("SELECT * FROM estructura WHERE elemento='logo'");
$datos_logo = $db->recorrer($sql_logo);
$logo_contenido = $datos_logo['contenido'];
$logo_tipo = $datos_logo['tipo'];

if($logo_contenido ==''){
	$logo_sql = 'Miempresa.com';
	$tpl->intext = 'Miempresa.com';
}elseif($logo_tipo == 'text'){
	$logo_sql = $logo_contenido;
	$tpl->intext = $logo_contenido;
}elseif($logo_tipo == 'img'){
	$ruta = '../styles/images/'.$datos_logo['contenido'];
	$rutasub = '../../styles/images/'.$datos_logo['contenido'];
	$logo_sql = $ruta;
	$logo_sql_sub = $rutasub;
	$tpl->intimg = $ruta;
	$tpl->intimg_sub = $rutasub;
	$tpl->type = 'img';
}

$tpl->logo = $logo_sql;
$tpl->logo_sub = $logo_sql_sub;
$db->liberar($sql_logo);

?>