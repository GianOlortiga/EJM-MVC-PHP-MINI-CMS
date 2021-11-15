<!DOCTYPE html>
<html lang="es">
<?php include("styles/templates/overall/head.php") ?>
<body>
	<?php include("styles/templates/overall/nav.php") ?>
	<section id="login">
		<section id="panel">
			<div id="_AJAX_"></div>
			<h1>Inicia Sesión</h1>
			<div id="form-login">
				<input type="text" name="user" id="user" placeholder="Ingresa tu usuario"><br>
				<input type="password" name="pass" id="pass" placeholder="Ingresa tu contraseña"><br>
				<input type="submit" id="send" value="Iniciar sesión">
			</div>
		</section>
	</section>
	<?php include("styles/templates/overall/footer.php") ?>
	<script>
		window.onload = function(){
			document.getElementById('send').onclick = function(){
				var user, pass, form, connect, result;
				user = document.getElementById('user').value;
				pass = document.getElementById('pass').value;
				if(user!='' && pass!=''){
					form = 'user=' + user + '&pass=' + pass;
					connect = window.XMLHttpRequest ? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHttp');
					connect.onreadystatechange = function(){
						if(connect.readyState==4 && connect.status == 200){
							if(parseInt(connect.responseText)==1){
								result = '<div class="alert alert-success">';
								result +='<p>Bienvenido...</p>';
								result += '</div>';
								document.getElementById('_AJAX_').innerHTML = result;
								location.href="../admin/";

							}else{
								result = '<div class="alert alert-danger">';
								result+='<strong>ERROR: </strong>Credenciales Incorrectas';
								result +='</div>';
								document.getElementById('_AJAX_').innerHTML = result;
							}
						}else if(connect.readyState!=4){
							result = '<div class="alert alert-warning">';
							result += '<p>Procesando...</p>';
							result+='</div>';
							document.getElementById('_AJAX_').innerHTML = result;
						}
					}
				connect.open('POST','?view=login');
				connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				connect.send(form); 
				}else{
					result = '<div class="alert alert-danger">';
					result +='<strong>ERROR:</strong>Debe completar todos los campos';
					result +='</div>';

					document.getElementById('_AJAX_').innerHTML = result;
				}
			}
		}
	</script>
</body>
</html>