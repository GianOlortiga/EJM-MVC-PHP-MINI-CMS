<!DOCTYPE html>
<html lang="es">
<?php include("styles/templates/overall/head.php") ?>
<body>
	<?php include("styles/templates/overall/nav.php") ?>
	<section id="principal-galeria">
		<div id="galeria">
			
			<div id="foto">
				<?php foreach ($galeria as $foto) :?>
				<img src="../styles/images/<?=$foto['imagen']?>" alt="<?=$foto['imagen']?>">
				<?php endforeach; ?>
			</div>
			
		</div>
		
	</section>
	<?php include("styles/templates/overall/footer.php") ?>
</body>
</html>