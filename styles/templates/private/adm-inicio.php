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
				<?}else if(isset($estado) && $estado =='error'){?>
				<div class="alert alert-danger">Ha ocurrido un error en el proceso. Verifique sus datos</div>
				<?}?>
				<h1>Actualizar Página Inicio</h1>
				<p>Cambie los datos que desee con relación a la página Inicio</p>
				<form action="../inicio/" method="POST" enctype="multipart/form-data">
					<p>Titulo de la Página Inicio</p>
					<input type="text" name="titulo" placeholder="Escribe un titulo" value="<?=$titulo?>" required="" autofocus=""><br>
					<p>Contenido de la sección</p>
					<textarea name="contenido" placeholder="Escribe el contenido de la sección" required="" autofocus="" resize="none" rows="30"><?=$contenido?></textarea>
					<br><br><hr><br>
					<input type="submit" value="Actualizar datos">
				</form>
			</div>
		</section>
	</section>
	<?php include("styles/templates/overall/footer.php") ?>
</body>
</html>