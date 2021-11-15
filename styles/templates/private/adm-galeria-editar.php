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
				
				<h1>Cambiar imagen de galeria</h1>
				<p>Aquí podrá cambiar la imagen de su galeria de imagenes</p>
				<form action="http://localhost/cms/admin/galeria/" method="POST" enctype="multipart/form-data" name="form_cambio">
					<input type="hidden" value="<?=$id_galery?>" name="id_h">
					<p>Imagen actual</p>
					<?php if(!empty($img)){ ?>
					<img src="../../../../styles/images/<?=$img?>" width="400px" height="250px" style="border:1px solid #ccc;background:#eee">
					<?}else{?>
					<img src="" width="400px" height="250px" style="border:1px solid #ccc;background:#eee">
					<?}?>
					<br>
					<p>O sube otra imagen para cambiar</p>
					<input type="file" name="galeria_img" accept="image/*" onchange="valida(this)" required>
					<br><br><hr><br>
					<input type="submit" value="Actualizar imagen" name="submit-editar" id="submit_e">
				</form>
			</div>
		</section>
	</section>
	<?php include("styles/templates/overall/footer.php") ?>
	<script>

	/*document.getElementById('submit_e').addEventListener("click", inpVal, false);
	function inpVal(e){
		e.preventDefault();
		if(document.form_cambio.galeria_img.value==""){
			alert("Es necesario subir una imagen");
			document.form_cambio.galeria_img.focus();
		}else{
			document.form_cambio.submit();
		}
	}*/
	</script>
</body>
</html>