<!DOCTYPE html>
<html lang="es">
<?php include("styles/templates/overall/head.php") ?>
<body>
	<?php include("styles/templates/overall/nav.php") ?>
	<section id="contactos">
		<section id="form-contacto">
			<h3>Contactos</h3>
			<p><strong>Dirección: </strong>Av. inventada N°777</p>
			<p><strong>Telefónos: </strong>9999999 - 9888888</p>
			<br>
			<p><strong>Dejanos tu mensaje</strong></p>
			<div>
				<input type="text" name="nombre" id="nombre" placeholder="Tu Nombre"><br>
				<input type="email" name="email" id="email" placeholder="Tu Email"><br>
				<textarea name="mensaje_cnt" id="mensaje_cnt" placeholder="Tu Mensaje"></textarea><br>
				<input type="submit" value="Enviar Mensaje" id="send">
			</div>
			<div id="_AJAX_"></div>
		</section>
		<section id="mapa">
			<?=$mapa?>
		</section>
	</section>
	<?php include("styles/templates/overall/footer.php") ?>
	<script>
		window.onload = function(){
			document.getElementById('send').onclick = function(){
				var connect, nombre, email, mensaje, form, result;
				nombre = document.getElementById('nombre').value;
				email = document.getElementById('email').value;
				mensaje_cnt = document.getElementById('mensaje_cnt').value;
				if(nombre != '' && email != '' && mensaje != ''){
					form = 'nombre=' + nombre + '&email=' + email + '&mensaje_cnt=' + mensaje_cnt;
					connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHttp');
					connect.onreadystatechange = function(){
						if(connect.readyState==4 && connect.status == 200){
							if(parseInt(connect.responseText)==1){
								result = '<div class="alert alert-success">';
								result +='<p>Su mensaje ha sido enviado</p>';
								result += '</div>';
								document.getElementById('_AJAX_').innerHTML = result;

							}else{
								result = '<div class="alert alert-danger">';
								result+='<strong>ERROR: </strong>Ha ocurrido un error interno, vuelva a intentarlo mas tarde';
								result +='</div>';
								document.getElementById('_AJAX_').innerHTML = result;
							}
						}else if(connect.readyState != 4){
							//procesando
							result = '<div class="alert alert-warning">';
							result += '<p>Procesando...</p>';
							result+='</div>';
							document.getElementById('_AJAX_').innerHTML = result;

						}
					}
					connect.open('POST','?view=contactos');
					connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
					connect.send(form);
				}else{
					//Datos vacios
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