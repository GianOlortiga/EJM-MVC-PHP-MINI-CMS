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
				
				<h1>Editar sección de página de servicios</h1>
				<p>Aquí podrá editar la sección de su página de servicios</p>
				<form action="http://localhost/cms/admin/servicios/editar/" method="POST" enctype="multipart/form-data">
					<p>Titulo de su servicio</p>
					<input type="hidden" value="<?=$id_servis?>" name="hidden">
					<input type="text" name="titulo" placeholder="Escribe un titulo" value="<?=$titulo?>" required="" autofocus=""><br>
					<p>Contenido de la sección</p>
					<textarea name="contenido" placeholder="Escribe el contenido de la sección" required="" autofocus="" resize="none"><?=$contenido?></textarea>
					<br>
					<p>Imagen actual</p>
					<?php if(!empty($img)){ ?>
					<img src="../../../../styles/images/<?=$img?>" width="200px" height="76px" style="border:1px solid #ccc;background:#eee">
					<?}else{?>
					<img src="" width="200px" height="76px" style="border:1px solid #ccc;background:#eee">
					<?}?>
					<br>
					<p>O Sube otra imagen</p>
					<input type="file" name="servicio_img" accept="image/*" onchange="valida(this)">
					<br><br><hr><br>
					<input type="submit" value="Actualizar datos" name="submit-editar">
				</form>
			</div>
		</section>
	</section>
	<?php include("styles/templates/overall/footer.php") ?>
</body>
</html>