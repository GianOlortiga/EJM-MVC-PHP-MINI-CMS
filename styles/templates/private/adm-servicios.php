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
				<h1>Administrar Sección Página de Servicios</h1>
				<p>Aquí podrá crear, editar, eliminar las secciones de su página de servicios</p>
				<a href="http://localhost/cms/admin/servicios/crear/" class="boton">Crear Nuevo</a><br>
				<table>
					<tr style="font-weight:bold">
						<td>IMAGEN</td>
						<td>TITULO</td>
						<td>ACCIONES</td>
					</tr>
					<?php foreach ($servis as $dato) {?>
					<tr>
						<td>
							<?php if(!empty($dato['img'])){ ?>
							<img src="http://localhost/cms/styles/images/<?=$dato['img']?>" width="100%">
							<?}else{?>
							<p style="text-align:center">Sin imagen</p>
							<?}?>
						</td>
						<td><?=$dato['titulo']?></td>
						<td>
							<a href="http://localhost/cms/admin/servicios/editar/<?=$dato['id']?>/">
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
						<p>¿Esta seguro que desea eliminar este servicio?</p>
						<form id="form-delete" action="http://localhost/cms/admin/servicios/" method="POST" enctype="multipart/form-data">
							<input type="hidden" id="id_h" name="id_h">
							<input type="submit" name="submit-delete" value="Eliminar">
						</form>
					</div>
					<div id="cerrar">x</div>
			</div>
		</section>
	</section>
	<?php include("styles/templates/overall/footer.php") ?>
</body>
</html>