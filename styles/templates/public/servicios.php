<!DOCTYPE html>
<html lang="es">
<?php include("styles/templates/overall/head.php") ?>
<body>
	<?php include("styles/templates/overall/nav.php") ?>
	<?php foreach ($servis as $dato) :?>
	<section id="principal-servicios">
		<article id="acerca"> 
			<h1><?=$dato['titulo']?></h1>
			<p><?=$dato['contenido']?></p>
		</article>
		<?php if(!empty($dato['img'])){ ?>
		<img src="../styles/images/<?=$dato['img']?>">
		<?}?>
	</section>
	<?php endforeach; ?>
	<?php include("styles/templates/overall/footer.php") ?>
</body>
</html>