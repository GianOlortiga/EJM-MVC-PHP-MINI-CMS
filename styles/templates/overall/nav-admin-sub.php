<header>
		<div id="logo">
				<?php if(isset($type) && $type = 'img'){ ?>
				<a href="http://localhost/cms/index/"><img src="<?=$logo_sub?>"></a>
				<?}else{?>
				<a href="http://localhost/cms/index/"><h1><?=$logo?></h1></a>
				<?}?>
		</div>
		<nav>
			<?php if(isset($session_id)){?>
			<ul>
				<li><a href="http://localhost/cms/admin/">Inicio</a></li>
				<li><a href="http://localhost/cms/admin/logout/">Cerrar Sessión</a></li>
				<li><a href="http://localhost/cms/index/" style="background:#3E4086">Mi Sitio</a></li>
			</ul>
			<h2>Panel Administración</h2>
			<?}?>
		</nav>
	</header>