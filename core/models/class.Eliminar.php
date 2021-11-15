<?php 

class Eliminar {
	private $id;

	public function ElimServicio(){
		if(!empty($_POST['id_h']) and is_numeric($_POST['id_h']) and $_POST['id_h']>0){
			$db = new Conexion();
			$this->id = $db->real_escape_string(stripslashes($_POST['id_h']));

			$sql_delete = $db->query("DELETE FROM servicios WHERE id='$this->id'");

			$db->close();
			header("Location: http://localhost/cms/admin/servicios/op/1/success/");
		}else{
			header("Location: http://localhost/cms/admin/servicios/op/2/error/");
		}
	}
	
}

 ?>