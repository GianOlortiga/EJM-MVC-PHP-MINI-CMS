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
				<h1>Actualizar Página Acerca</h1>
				<p>Cambie los datos que desee con relación a la página Acerca</p>
				<form action="../acerca/" method="POST" enctype="multipart/form-data">
					<p>Titulo de la Página Acerca</p>
					<input type="text" name="titulo" placeholder="Escribe un titulo" value="<?=$titulo?>" required="" autofocus=""><br>
					<p>Contenido de la sección</p>
					<textarea name="contenido" placeholder="Escribe el contenido de la sección" required="" autofocus="" resize="none" rows="30"><?=$contenido?></textarea>
					<br>
					<p>Imagen actual</p>
					<img src="../../styles/images/<?=$img?>" width="200px" height="76px" style="border:1px solid #ccc;background:#eee">
					<br>
					<p>o sube otra imagen</p>
					<input type="file" name="acerca_img" accept="image/*" onchange="valida(this)">
					<br><br><hr><br>
					<input type="submit" value="Actualizar datos">
				</form>
			</div>
		</section>
	</section>
	<?php include("styles/templates/overall/footer.php") ?>
</body>
</html>