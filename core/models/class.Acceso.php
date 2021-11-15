<?php 
class Acceso{
	private $user;
	private $pass;

	public function Encrypt($string){
		$siseof = strlen($string);
		$result = '';
		for($x=$string; $x>=0; $x--){
			$result .= $string[$x];
		}
		return md5($result);
	}

	public function Login(){
		try {
			if(!empty($_POST['user']) and !empty($_POST['pass'])){
				$db = new Conexion();
				$this->user = $db->real_escape_string($_POST['user']);
				$this->pass = $this->Encrypt($_POST['pass']);

				$sql2 = $db->query("SELECT * FROM users WHERE user='$this->user' and pass='$this->pass'");

				if($db->rows($sql2)>0){
					$datos_sql = $db->recorrer($sql2);

					$_SESSION['id']=$datos_sql['id'];
					$_SESSION['user']=$datos_sql['user'];
					$_SESSION['pass']=$datos_sql['pass'];

					echo 1;
				}else{
					throw new Exception(2);	
				}
				$db->liberar($sql2);
				$db->close();
			}else{
				throw new Exception("ERROR: Datos vacios");		
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
}

 ?>