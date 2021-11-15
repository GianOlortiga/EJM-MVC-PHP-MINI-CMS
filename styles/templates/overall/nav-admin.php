<header>
		<div id="logo">
				<?php if(isset($type) && $type = 'img'){ ?>
				<a href="../index/"><img src="<?=$logo?>"></a>
				<?}else{?>
				<a href="../index/"><h1><?=$logo?></h1></a>
				<?}?>
		</div>
		<nav>
			<?php if(isset($session_id)){?>
			<ul>
				<li>
				<?php if(isset($get) &&  $get == 'admin'){ ?>
				<a href="../admin/" class="active">
				<?}else{?><a href="../admin/" ><?}?>Inicio</a></li>
				<li><a href="../logout/">Cerrar Sessión</a></li>
				<li><a href="../index/" style="background:#3E4086">Mi Sitio</a></li>
			</ul>
			<h2>Panel Administración</h2>
			<?}?>
		</nav>
	</header>