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
				<h1>Actualizar Página Contactos</h1>
				<p>Cambie los datos que desee con relación a la página Contactos</p>
				<form action="../contactos/" method="POST" enctype="multipart/form-data">
					<p>Correo eléctronico de destino del formulario de contacto</p>
					<input type="email" name="email" placeholder="Escribe tu email de contacto" value="<?=$email?>" required="" autofocus=""><br>
					<p>Mapa iframe Google Maps (Introduzca el código iframe para su mapa de contacto)</p>
					<textarea name="mapa" placeholder="Introduzca el código iframe de su mapa" resize="none"><?=$mapa?></textarea>
					<br><br><hr><br>
					<input type="submit" value="Actualizar datos">
				</form>
			</div>
		</section>
	</section>
	<?php include("styles/templates/overall/footer.php") ?>
</body>
</html>