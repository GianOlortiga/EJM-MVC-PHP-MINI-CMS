<?php 

class Actualizar{
	private $id;
	private $titulo;
	private $contenido;
	private $tipo;
	private $email;
	private $mapa;
	private $footer;
	
	public function Actlogo(){
		$db = new Conexion();
		$this->contenido = $db->real_escape_string(stripslashes($_POST['logo']));

		$sql = $db->query("SELECT * FROM estructura WHERE elemento='logo'");
		$contenido_logo = '';
		$type = '';
		
		if($_FILES['logo_img']['name'] != ''){

			if ($_FILES["logo_img"]["type"] =="image/jpeg" || $_FILES["logo_img"]["type"] =="image/gif" || $_FILES["logo_img"]["type"] =="image/png"){
				$contenido_logo = 'logo.png';
				$type = 'img';
				$ruta = 'styles/images/'.$contenido_logo;
				if(file_exists($ruta)){
					unlink($ruta);
				}

				move_uploaded_file($_FILES['logo_img']['tmp_name'], $ruta);

			}else{
			header("Location: http://localhost/cms/admin/logo/op/2/error/");
			}

		}else if($this->contenido != 'Miempresa.com'){
			$contenido_logo = $this->contenido;
			$type = 'text';
		}

		$sql_actualizar = $db->query("UPDATE estructura SET contenido = '$contenido_logo', tipo='$type' WHERE elemento = 'logo'");
		$db->liberar($sql);
		$db->close();
		header("Location: http://localhost/cms/admin/logo/op/1/success/");
	}

	public function ActInicio(){
		if(!empty($_POST['titulo']) && !empty($_POST['contenido'])){
			$db = new Conexion();
			$this->titulo = $db->real_escape_string(stripslashes($_POST['titulo']));
			$this->contenido = $db->real_escape_string(stripslashes($_POST['contenido']));

			$sql_actualizar = $db->query("UPDATE inicio SET titulo='$this->titulo', contenido='$this->contenido' WHERE elemento='principal'");

			header("Location: http://localhost/cms/admin/inicio/op/1/success/");
		}else{
			header("Location: http://localhost/cms/admin/inicio/op/2/error/");
		}
	}

	public function ActAcerca(){
		if(!empty($_POST['titulo']) && !empty($_POST['contenido'])){
			$db = new Conexion();
			$this->titulo = $db->real_escape_string(stripslashes($_POST['titulo']));
			$this->contenido = $db->real_escape_string(stripslashes($_POST['contenido']));
			$img_acerca = 'acerca.jpg';

			if($_FILES['acerca_img']['name'] != ''){

				if ($_FILES["acerca_img"]["type"] =="image/jpeg" || $_FILES["acerca_img"]["type"] =="image/gif" || $_FILES["acerca_img"]["type"] =="image/png"){
					$img_acerca = 'acerca.jpg';
					$ruta = 'styles/images/'.$img_acerca;
					if(file_exists($ruta)){
						unlink($ruta);
					}

					move_uploaded_file($_FILES['acerca_img']['tmp_name'], $ruta);

				}else{
					header("Location: http://localhost/cms/admin/acerca/op/2/error/");
				}

			}

			$sql_actualizar = $db->query("UPDATE acerca SET titulo='$this->titulo', contenido='$this->contenido', img='$img_acerca' WHERE id=1");
			$db->close();
			header("Location: http://localhost/cms/admin/acerca/op/1/success/");
		}else{
			header("Location: http://localhost/cms/admin/acerca/op/2/error/");
		}
	}
	public function ActServicio(){
		if(!empty($_POST['hidden']) && !empty($_POST['titulo']) && !empty($_POST['contenido'])){

			if(is_numeric($_POST['hidden']) && $_POST['hidden']>0){

				$db = new Conexion();

				$this->id = $db->real_escape_string(stripslashes($_POST['hidden']));
				
				$sql = $db->query("SELECT id,img FROM servicios WHERE id='$this->id'");

				if($db->rows($sql)>0){

					$this->titulo = $db->real_escape_string(stripslashes($_POST['titulo']));
					$this->contenido = $db->real_escape_string(stripslashes($_POST['contenido']));

					$datos = $db->recorrer($sql);
					$img_id = $datos['id'];

					$img_servicio='';

					if($_FILES['servicio_img']['name'] != ''){

						if ($_FILES["servicio_img"]["type"] =="image/jpeg" || $_FILES["servicio_img"]["type"] =="image/gif" || $_FILES["servicio_img"]["type"] =="image/png"){
							
							if(empty($datos['img'])){
								$img_servicio = 'servicio_'.$img_id.'.jpg';
							}else{
								$img_servicio = $datos['img'];
							}

							$ruta = 'styles/images/'.$img_servicio;
							if(file_exists($ruta)){
								unlink($ruta);
							}

							move_uploaded_file($_FILES['servicio_img']['tmp_name'], $ruta);

						}else{
							header("Location: http://localhost/cms/admin/servicios/op/2/error/");
						}

					}

					$sql_actualizar = $db->query("UPDATE servicios SET titulo='$this->titulo', contenido='$this->contenido', img='$img_servicio' WHERE id='$this->id'");
					$db->liberar($sql);
					$db->close();
					header("Location: http://localhost/cms/admin/servicios/op/1/success/");
				}else{

				$db->liberar($sql);
				header("Location: http://localhost/cms/admin/servicios/op/2/error/");
				}

			}else{
				header("Location: http://localhost/cms/admin/servicios/op/2/error/");
			}
		}else{
			header("Location: http://localhost/cms/admin/servicios/op/2/error/");
		}
	}
	public function ActContactos(){
		if(!empty($_POST['email'])){
			$db = new Conexion();

			$this->email = $db->real_escape_string(stripslashes($_POST['email']));
			$this->mapa = $db->real_escape_string(stripslashes(htmlentities($_POST['mapa'])));

			$sql_actualizar = $db->query("UPDATE contacto SET email='$this->email', mapa='$this->mapa' WHERE elemento='contactos'");

			header("Location: http://localhost/cms/admin/contactos/op/1/success/");
		}else{
			header("Location: http://localhost/cms/admin/contactos/op/2/error/");
		}
	}

	public function ActFooter(){
		$db = new Conexion();

		$this->footer = $db->real_escape_string(stripslashes($_POST['footer']));

		$sql_actualizar = $db->query("UPDATE estructura SET contenido='$this->footer' WHERE elemento='footer'");

		header("Location: http://localhost/cms/admin/footer/op/1/success/");
	}

}

 ?>