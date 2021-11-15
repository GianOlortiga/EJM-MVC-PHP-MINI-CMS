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
				<h1>Actualizar Pie de Página</h1>
				<p>Cambie los datos que desee con relación al pie de página</p>
				<form action="../footer/" method="POST" enctype="multipart/form-data">
					<p>Contenido del pie de página</p>
					<input type="text" name="footer" placeholder="Escribe tu contenido de pie de página" value="<?=$footer?>" size="50">
					<p>*Campo no es requerido</p>
					<br><hr><br>
					<input type="submit" value="Actualizar datos">
				</form>
			</div>
		</section>
	</section>
	<?php include("styles/templates/overall/footer.php") ?>
</body>
</html>