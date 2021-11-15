<?php 
$sql_footer = $db->query("SELECT contenido FROM estructura WHERE elemento='footer'");
$datos_footer = $db->recorrer($sql_footer);
$footer_sql = $datos_footer['contenido'];

$tpl->footer = $footer_sql;

$db->liberar($sql_footer);

?>