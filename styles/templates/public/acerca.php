<!DOCTYPE html>
<html lang="es">
<?php include("styles/templates/overall/head.php") ?>
<body>
	<?php include("styles/templates/overall/nav.php") ?>
	<section id="principal-acerca">
		<article id="acerca">
			<h1><?=$titulo?></h1>
			<p><?=$contenido?></p>
		</article>
		<img src="../styles/images/<?=$imagen?>">
	</section>
	<?php include("styles/templates/overall/footer.php") ?>
</body>
</html>