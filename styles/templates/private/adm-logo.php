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
				<h1>Actualizar Logo</h1>
				<p>Las medidas recomendadas para el logo son: 200px x 76px</p>
				<br>
				<form action="../logo/" method="POST" enctype="multipart/form-data">
					<p>Logo en texto</p>
					<input type="text" name="logo" placeholder="Texto de tu logo" value="<?=$intext?>"><br>
					<p>o sube una imagen de tu logo</p>
					<input type="file" name="logo_img" accept="image/*" onchange="valida(this)"><br>
					<p>Imagen logo actual</p>
					<img src="<?=$intimg_sub?>" width="200px" height="76px" style="border:1px solid #ccc;background:#eee">
					<br><br><hr><br>
					<input type="submit" value="Actualizar datos">
				</form>
			</div>
		</section>
	</section>
	<?php include("styles/templates/overall/footer.php") ?>
</body>
</html>