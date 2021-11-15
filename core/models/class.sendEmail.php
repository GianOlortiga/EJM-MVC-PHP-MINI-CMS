<?php 

class SendEmail {
	private $nombre;
	private $email;
	private $mensaje;

	public function Enviar(){
		try{
			if(!empty($_POST['nombre']) and !empty($_POST['email']) and !empty($_POST['mensaje_cnt'])){
				$db = new Conexion();
				$this->nombre = $db->real_escape_string($_POST['nombre']);
				$this->email = $db->real_escape_string($_POST['email']);
				$this->mensaje = $db->real_escape_string($_POST['mensaje_cnt']);

				$sql2 = $db->query("SELECT email FROM contacto WHERE elemento='contactos'");
				$dato_sql2 = $db->recorrer($sql2);

				$destinatario = $dato_sql2['email'];
				
				$cabeceras = "De: $this->email\n"
				 ."Reply-To: $this->email\n";
				$asunto = "Le han enviado un mensaje desde su sitio web";
				$email_to = "$destinatario"; 
				$contenido = "$this->nombre le ha enviado un mensaje desde tu sitio web\n"
				. "\n"
				. "Nombre: $this->nombre\n"
				. "Email: $this->email\n"
				. "Mensaje: $this->mensaje\n"
				. "\n";

				echo 1;
				if(@mail($email_to,$asunto,$contenido,$cabeceras)){
					echo 1;
				}else{
					throw new Exception(2);			
				}
				$db->liberar($sql2);
				$db->close();
			}else{
				throw new Exception("ERROR: Datos no deben estar vacios");
			}
		}catch(Exception $error){
			echo $error->getMessage();
		}
	}
}

?>