<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Home</title>
<link rel="stylesheet" href="style.css">
<!-- <script src="script.js"></script> -->
</head>
<header>
	<a href="J.php">Générer relevés</a> || <a href="releve.php">Afficher
		les relevés</a> || <a href="index.php">Statut </a><br>
</header>
<body>

	<?php
	include("parametrage.php");

	include("requetes.php");
	$resultatT = $mysqli->query($requeteT);
	$resultatH = $mysqli->query($requeteH);
	$T = $resultatT->fetch_array();
	$T = round($T[0],1);
	$Harray = $resultatH->fetch_array();
	$H = round($Harray[0],1);
	$D = $Harray[1];

	echo "Temp: ".$T.""." Hum: ".$H. " (à ".$D.")";

// ?>
	<br>
	<img src="J.png" alt="Jour" />
	<br>
	<img src="M.png" alt="Jour" />
	<br>
	<img src="TC.png" alt="Jour" />
	<br>


</body>
</html>
