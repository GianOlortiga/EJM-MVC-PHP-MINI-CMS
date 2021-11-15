<html>
<?php //include ("styles/templates/overall/header.php") ?>
<head>
      <title>Sistema de plantillas sin Smarty</title>
      <link rel="stylesheet" type="text/css" href="styles/css/style.css">
</head>
<body>
      <ul>
      <?php foreach ($frutas as $fruta) : ?>
            <li><?=$fruta?></li>
      <?php endforeach; ?>
      </ul>

</body>
</html> 