<header>
		<div id="logo">
				<?php if(isset($type) && $type = 'img'){ ?>
				<a href="../index/"><img src="<?=$logo?>"></a>
				<?}else{?>
				<a href="../index/"><h1><?=$logo?></h1></a>
				<?}?>
		</div>
		<nav>
			<ul>
				<li>
				<?php if(isset($get) &&  $get == 'index'){ ?>
				<a href="../index/" class="active">
				<?}else{?><a href="../index/" ><?}?>Inicio</a></li>
				<li>
				<?php if(isset($get) &&  $get == 'acerca'){ ?>
				<a href="../index/" class="active">
				<?}else{?><a href="../acerca/" ><?}?>Acerca</a></li>
				<li>
				<?php if(isset($get) &&  $get == 'servicios'){ ?>
				<a href="../index/" class="active">
				<?}else{?><a href="../servicios/" ><?}?>Servicios</a></li>
				<li>
				<?php if(isset($get) &&  $get == 'galeria'){ ?>
				<a href="../index/" class="active">
				<?}else{?><a href="../galeria/" ><?}?>Galeria</a></li>
				<li>
				<?php if(isset($get) &&  $get == 'contactos'){ ?>
				<a href="../index/" class="active">
				<?}else{?><a href="../contactos/" ><?}?>Contactos</a></li>
				<?php if(isset($session_id)){?>
				<li><a href="../admin/" style="background:#3E4086">Admin</a></li>
				<?}else{?>
				<li><a href="../login/" style="background:#3E4086">Login</a></li>
				<?}?>
			</ul>
		</nav>
	</header>