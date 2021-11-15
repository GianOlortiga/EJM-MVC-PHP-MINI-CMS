<p>Bienvenido: <?=$user?></p>
			<h3>Administrar</h3>
			<?php if(isset($session_id)){?>
			<div class="item">
				<a href="logo/"><div class="opcion">Administrar Logo
				</div></a>
			</div>
			<div class="item">
				<a href="inicio/">
				<div class="opcion">Administrar Página de Inicio
				</div></a>
			</div>
			<div class="item">
				<a href="acerca/">
				<div class="opcion">Administrar Página de Acerca
				</div></a>
			</div>
			<div class="item">
				<div class="opcion">Administrar Página de Servicios
				</div>
				<div class="sub-opcion">
					<a href="servicios/">Administrar secciones</a><br><br>
					<a href="servicios/crear/">Crear nuevo servicio</a>
				</div>
			</div>
			<div class="item">
				<div class="opcion">Administrar Galería
				</div>
				<div class="sub-opcion">
					<a href="galeria/">Administrar imagenes</a><br><br>
					<a href="galeria/#">Subir nueva imágen</a>
				</div>
			</div>
			<div class="item">
				<a href="contactos/">
				<div class="opcion">Administrar Página de Contactos
				</div></a>
			</div>
			<div class="item">
				<a href="footer/">
				<div class="opcion">Administrar Pie de Página
				</div></a>
			</div>
			<?}?>