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
				
				<h1>Crear nueva sección para página de servicios</h1>
				<p>Aquí podrá crear una nueva sección para su página de servicios</p>
				<form action="http://localhost/cms/admin/servicios/crear/" method="POST" enctype="multipart/form-data">
					<p>Titulo de su servicio</p>
					<input type="text" name="titulo" placeholder="Escribe un titulo" required="" autofocus=""><br>
					<p>Contenido de la sección</p>
					<textarea name="contenido" placeholder="Escribe el contenido de la sección" required="" autofocus="" resize="none"></textarea>
					<br>
					<p>Sube una imagen</p>
					<input type="file" name="servicio_img" accept="image/*" onchange="valida(this)">
					<br><br><hr><br>
					<input type="submit" value="Actualizar datos" name="submit-crear">
				</form>
			</div>
		</section>
	</section>
	<?php include("styles/templates/overall/footer.php") ?>
</body>
</html>