<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Home</title>
<link rel="stylesheet" href="style.css">
<!-- <script src="script.js"></script> -->
</head>
<header>
	<a href="J.php">Générer relevés</a><br> <a href="releve.php">Afficher
		les relevés</a><br> <a href="index.php">Statut </a><br>
</header>
<body>
	<?php
	include("GetServerStatus.php");

	$mercure = GetServerStatus("192.168.1.7",80);
	if ($mercure == 'UP')
		echo 'Mercure<br>';

	$DomoPi = GetServerStatus("192.168.1.12",8080);
	if ($DomoPi == 'UP')
		echo 'DomoPi<br>';

	$XBMC = GetServerStatus("192.168.1.26",80);
	if ($XBMC == 'UP')
		echo 'XBMC<br>';
	
	?>
</body>
</html>





