<?php 

class Crear {
	private $titulo;
	private $contenido;

	public function CrearServicio(){
		if(!empty($_POST['titulo']) && !empty($_POST['contenido'])){
			$db = new Conexion();
			$this->titulo = $db->real_escape_string(stripslashes($_POST['titulo']));
			$this->contenido = $db->real_escape_string(stripslashes($_POST['contenido']));
			
			$sql_img = $db->query("SELECT MAX(id) AS id FROM servicios");
			$dato = $db->recorrer($sql_img);
			$id_img = $dato[0]+1;
			$img_servicio = '';

			if($_FILES['servicio_img']['name'] != ''){

				if ($_FILES["servicio_img"]["type"] =="image/jpeg" || $_FILES["servicio_img"]["type"] =="image/gif" || $_FILES["servicio_img"]["type"] =="image/png"){
					$img_servicio = 'servicio_'.$id_img.'.jpg';
					$ruta = 'styles/images/'.$img_servicio;
					if(file_exists($ruta)){
						unlink($ruta);
					}

					move_uploaded_file($_FILES['servicio_img']['tmp_name'], $ruta);

				}else{
					header("Location: http://localhost/cms/admin/servicios/op/2/error/");
				}

			}

			$sql_actualizar = $db->query("INSERT INTO servicios (titulo,contenido,img) VALUES ('$this->titulo','$this->contenido','$img_servicio')");
			$db->close();
			header("Location: http://localhost/cms/admin/servicios/op/2/success/");
		}
	}
}

 ?>