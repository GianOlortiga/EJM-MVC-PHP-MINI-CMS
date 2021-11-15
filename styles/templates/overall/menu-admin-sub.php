<p>Bienvenido: <?=$user?></p>
			<h3>Administrar</h3>
				<?php if(isset($session_id)){?>
				<div class="item">
					<a href="http://localhost/cms/admin/logo/">
					<?php if(isset($get) && $get == 'adm-logo'){ ?>
					<div class="opcion active-menu">
					<?}else{?>
					<div class="opcion"><?}?>Administrar Logo</div>
					</a>
				</div>
				<div class="item">
					<a href="http://localhost/cms/admin/inicio/">
					<?php if(isset($get) && $get == 'adm-inicio'){ ?>
					<div class="opcion active-menu">
					<?}else{?>
					<div class="opcion"><?}?>Administrar Página de Inicio
					</div></a>
				</div>
				<div class="item">
					<a href="http://localhost/cms/admin/acerca/">
					<?php if(isset($get) && $get == 'adm-acerca'){ ?>
					<div class="opcion active-menu">
					<?}else{?>
					<div class="opcion"><?}?>Administrar Página de Acerca
					</div></a>
				</div>
				<div class="item">
					<?php if(isset($get) && $get == 'adm-servicios'){ ?>
					<div class="opcion active-menu">
					<?}else{?>
					<div class="opcion"><?}?>Administrar Página de Servicios
					</div>
					<div class="sub-opcion">
						<a href="http://localhost/cms/admin/servicios/">Administrar secciones</a><br><br>
						<a href="http://localhost/cms/admin/servicios/crear/">Crear nuevo servicio</a>
					</div>
				</div>
				<div class="item">
					<?php if(isset($get) && $get == 'adm-galeria'){ ?>
					<div class="opcion active-menu">
					<?}else{?>
					<div class="opcion"><?}?>Administrar Galería
					</div>
					<div class="sub-opcion">
						<a href="http://localhost/cms/admin/galeria/">Administrar imagenes</a><br><br>
						<a href="http://localhost/cms/admin/galeria/#">Subir nueva imágen</a>
					</div>
				</div>
				<div class="item">
					<a href="http://localhost/cms/admin/contactos/">
					<?php if(isset($get) && $get == 'adm-contactos'){ ?>
					<div class="opcion active-menu">
					<?}else{?>
					<div class="opcion"><?}?>Administrar Página de Contactos
					</div></a>
				</div>
				<div class="item">
					<a href="http://localhost/cms/admin/footer/">
					<?php if(isset($get) && $get == 'adm-footer'){ ?>
					<div class="opcion active-menu">
					<?}else{?>
					<div class="opcion"><?}?>Administrar Pie de Página
					</div></a>
				</div>
				<?}?>