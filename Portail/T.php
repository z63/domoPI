<?php
include("parametrage.php");

include("requetes.php");

$resultatT = $mysqli->query($requeteT);

$T = $resultatT->fetch_array();
$T = round($T[0],1);

echo $T;

// ?>