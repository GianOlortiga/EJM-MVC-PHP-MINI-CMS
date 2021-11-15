<?php 

class Galery{
	private $id;

	public function optimizar_imagen($rtOriginal, $max_ancho, $max_alto, $destino, $nombre_final) {

		//Redimensionar
	
		$original = imagecreatefromjpeg($rtOriginal);
	
		list($ancho,$alto)=getimagesize($rtOriginal);
	
		$x_ratio = $max_ancho / $ancho;
		$y_ratio = $max_alto / $alto;
	
	
		if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
			$ancho_final = $ancho;
			$alto_final = $alto;
	
		}elseif (($x_ratio * $alto) < $max_alto){
			$alto_final = ceil($x_ratio * $alto);
			$ancho_final = $max_ancho;
	
		}else{
			$ancho_final = ceil($y_ratio * $ancho);
			$alto_final = $max_alto;
		}
	
		$lienzo=imagecreatetruecolor($ancho_final,$alto_final); 
	
		imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
	
		imagedestroy($original);
	
		imagejpeg($lienzo,$destino.$nombre_final);
	
		return true; 
	}
	
	public function optimizar_imagen_min($origen, $destino, $nombre_final) {
	
	
		  $imagen = imagecreatefromjpeg($origen);
	
		  $calidad = 95;
	
		  imagejpeg($imagen, $destino.$nombre_final , $calidad);
		  
		  return true; 
	}

	public function SubirImgs(){
		if ($_FILES['imgs_galeria']['name'] != ''){
	
			$cantidad= count($_FILES["imgs_galeria"]['tmp_name']);

			$db = new Conexion();

			$this->id = $db->real_escape_string($_POST['gal_id']);
			
			for ($i=0; $i<$cantidad; $i++){
				
				if ($_FILES['imgs_galeria']['type'][$i]=="image/jpeg" || $_FILES['imgs_galeria']['type'][$i]=="image/jpg"){
				
				$imagen = time().$i.'.jpg';

				$ruta = 'styles/images/';

				$max_ancho = 600;
				$max_alto = 800;

				$medidasimagen= getimagesize($_FILES['imgs_galeria']['tmp_name'][$i]);

				if($medidasimagen[0] < 600 ){
	
					$this->optimizar_imagen_min($_FILES['imgs_galeria']['tmp_name'][$i], $ruta, $imagen);
						
				}else{
						
					$this->optimizar_imagen($_FILES['imgs_galeria']['tmp_name'][$i], $max_ancho, $max_alto, $ruta, $imagen);
						
				}

				$db->query("INSERT INTO galeria(imagen,gal_id) VALUES ('$imagen','$this->id')");

				// move_uploaded_file($_FILES["imgs_galeria"]["tmp_name"][$i], "styles/images/".$imagen);


				}else{
					echo 2;
				}
			}
			echo 1;
		}else{
			echo 3;
		}
	}
	
	public function ActImg(){
		if($_FILES['galeria_img']['name'] != ''){

			if ($_FILES["galeria_img"]["type"] =="image/jpeg" || $_FILES["galeria_img"]["type"] =="image/gif" || $_FILES["galeria_img"]["type"] =="image/png"){

				if(!empty($_POST['id_h']) && is_numeric($_POST['id_h']) && $_POST['id_h']>0){

					$db = new Conexion();

					$this->id = $db->real_escape_string(stripslashes($_POST['id_h']));
						
					$sql = $db->query("SELECT * FROM galeria WHERE id='$this->id'");

					if($db->rows($sql)>0){

						$datos = $db->recorrer($sql);
						$img_id = $datos['id'];
						$img_de = $datos['imagen'];

						$img_galeria = time().$img_id.'.jpg';

						$ruta = 'styles/images/';

						$eliminar = 'styles/images/'.$img_de;
						if(file_exists($eliminar)){
							unlink($eliminar);
						}

						//move_uploaded_file($_FILES['galeria_img']['tmp_name'], $ruta);
						$max_ancho = 600;
						$max_alto = 800;

						$medidasimagen= getimagesize($_FILES['galeria_img']['tmp_name']);

						if($medidasimagen[0] < 600 ){
	
							$this->optimizar_imagen_min($_FILES['galeria_img']['tmp_name'], $ruta, $img_galeria);
						
						}else{
						
							$this->optimizar_imagen($_FILES['galeria_img']['tmp_name'], $max_ancho, $max_alto, $ruta, $img_galeria);
						
						}


						$sql_actualizar = $db->query("UPDATE galeria SET imagen='$img_galeria' WHERE id='$this->id'");
						$db->liberar($sql);
						$db->close();
						header("Location: http://localhost/cms/admin/galeria/op/1/success/");
					}else{

					$db->liberar($sql);
					header("Location: http://localhost/cms/admin/galeria/op/2/error/");
					}

				}else{
					header("Location: http://localhost/cms/admin/galeria/op/2/error/");
				}
			}else{
				header("Location: http://localhost/cms/admin/galeria/op/2/error/");
			}
		}else{
			header("Location: http://localhost/cms/admin/galeria/op/2/error/");
		}
	}
	public function ElimImg(){
		if(!empty($_POST['id_h']) and is_numeric($_POST['id_h']) and $_POST['id_h']>0){
			$db = new Conexion();
			$this->id=$db->real_escape_string(stripslashes($_POST['id_h']));

			$img_galeria = 'galeria_'.$this->id.'.jpg';
			$ruta = 'styles/images/'.$img_galeria;
			if(file_exists($ruta)){
				unlink($ruta);
			}
			$sql_delete = $db->query("DELETE FROM galeria WHERE id='$this->id'");

			$db->close();
			header("Location: http://localhost/cms/admin/galeria/op/1/success/");
		}else{
			header("Location: http://localhost/cms/admin/galeria/op/2/error/");
		}
	}
}

 ?>