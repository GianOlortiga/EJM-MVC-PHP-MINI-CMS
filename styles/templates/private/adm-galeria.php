<!DOCTYPE html>
<html lang="es">
<?php include("styles/templates/overall/head-admin.php") ?>
<body>
	<?php include("styles/templates/overall/nav-admin-sub.php") ?>
	<section id="principal-admin">
		<section id="admin-menu">
			<?php include("styles/templates/overall/menu-admin-sub.php") ?>	
		</section>
		<section id="admin-content">
			<div id="marco">
				<?php if(isset($estado) && $estado =='success'){ ?>
				<div class="alert alert-success">El proceso se ha realizado con exito</div>
				<?}else if(isset($estado) && $estado =='errorvacio'){?>
				<div class="alert alert-danger">Ha ocurrido un error en el proceso. Se envio valor vacio</div>
				<?}else if(isset($estado) && $estado =='errortipo'){?>
				<div class="alert alert-danger">Ha ocurrido un error en el proceso. Imagen no es imagen</div>
				<?}else if(isset($estado) && $estado =='errorna'){?>
				<div class="alert alert-danger">Error Inesperado</div>
				<?}?>
				<h1>Administración de la galeria de imagenes</h1>
				<p>Aquí podrá subir, editar o eliminar las imagenes de su página de galeria</p>
				<div id="sms"></div>
				<div class="progressBar" id="progressBarra">
					<div id="progreso"></div>
				</div>
				<form id="form" >
					<input type ="hidden" name="gal_id" value="1">
					<input type="file" id="imgs_galeria[]" name="imgs_galeria[]" onchange="valida_multiple(this)" accept="image/jpeg" multiple=""  required><br><br>
					<input type="submit" id="send" value="Subir Imagenes" name="submit-subir">
				</form>
				<br>
				<table>
					<tr style="font-weight:bold">
						<td>IMAGEN</td>
						<td>ACCIONES</td>
					</tr>
					<?php foreach ($imgs as $dato) {?>
					<tr>
						<td>
							<?php if(!empty($dato['imagen'])){ ?>
							<img src="http://localhost/cms/styles/images/<?=$dato['imagen']?>" width="100%">
							<?}?>
						</td>
						<td>
							<a href="http://localhost/cms/admin/galeria/editar/<?=$dato['id']?>/">
								<img src="http://localhost/cms/styles/images/editar-boton.png" title="editar" width="21px">
							</a> | 
								<img class="icon-delete" src="http://localhost/cms/styles/images/eliminar.png" title="eliminar" alt="<?=$dato['id']?>" width="21px">
							
						</td>
					</tr>
					<?}?>
				</table>
				
			</div>
			<div id="mensaje">
					<div id="mensaje-form">
						<p>¿Esta seguro que desea eliminar esta imágen?</p>
						<form id="form-delete" action="http://localhost/cms/admin/galeria/" method="POST" enctype="multipart/form-data">
							<input type="hidden" id="id_h" name="id_h">
							<input type="submit" name="submit-delete" value="Eliminar">
						</form>
					</div>
					<div id="cerrar">x</div>
			</div>
		</section>
	</section>
	<?php include("styles/templates/overall/footer.php") ?>
	<script>
		window.addEventListener('load',init);
		function init(){
			document.querySelector('#form').addEventListener('submit',sendForm,false);
		}

		function sendForm(e){
			e.preventDefault();
			var form = this;
			var archivos = document.getElementById('imgs_galeria[]').files;
			var sms = document.getElementById('sms');
			
			var fD = new FormData(form);
			var ajax = new XMLHttpRequest();
			ajax.onreadystatechange = function(){
				if(ajax.readyState==4 && ajax.status == 200){
					if(parseInt(ajax.responseText)==1){
							sms.innerHTML = '<div class="estado-ajax"><p>Se subieron las imagenes correctamente. Espere un momento...</p></div>';
							window.setTimeout ("location.href='http://localhost/cms/admin/galeria/op/1/success/'", 2000); 
					}else if(parseInt(ajax.responseText)==2){
							sms.innerHTML = '<div class="estado-ajax"><p style="color:red">Imagen no es de tipo imagen</p></div>';
							window.setTimeout ("location.href='http://localhost/cms/admin/galeria/op/2/errortipo/'", 2000); 
					}else if(parseInt(ajax.responseText)==3){
							document.getElementById('progreso').style.background = 'red';
							sms.innerHTML = '<div class="estado-ajax"><p style="color:red">Valor imagen vacio</p></div>';
							window.setTimeout ("location.href='http://localhost/cms/admin/galeria/op/3/errorvacio/'", 1500); 
					}else{
							document.getElementById('progreso').style.background = 'red';
							sms.innerHTML = '<div class="estado-ajax"><p style="color:red">InesperadoError</p></div>';
							window.setTimeout ("location.href='http://localhost/cms/admin/galeria/op/4/errorna/'", 1500); 
					}
				}else if(ajax.readyState!=4){
							sms.innerHTML = '<div class="estado-ajax"><p>Subiendo las imagenes...</p></div>';
				}

			};
			ajax.open('POST','?view=admin&admin=galeria',true);
			document.getElementById('progressBarra').style.display = 'block';
			ajax.upload.addEventListener('progress',function(e){
				if(e.lengthComputable){
						document.querySelector('#progreso').style.width = ((e.loaded / e.total) * 100)+'%';
				}
			});
			ajax.send(fD);	
		document.getElementById('progreso').style.background = '#F8CA4D';
		return false;

		}

	</script>
</body>
</html>