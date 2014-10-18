<?php
// controleRadiateur.php


include("parametrage.php");

include("requetes.php");

$resultatT = $mysqli->query($requeteParametre);

$parametres = $resultatT->fetch_all();
$consigneT = round($parametres[0][2]);

$ecartT = round($parametres[1][2]);

$resultatT = $mysqli->query($requeteT);

$T = $resultatT->fetch_array();
$T = round($T[0],1);

$radiateurON = file_get_contents("http://192.168.1.35:3480/data_request?id=action&output_format=xml&DeviceNum=3&serviceId=urn:upnp-org:serviceId:SwitchPower1&action=SetTarget&newTargetValue=1");
$radiateurOFF = file_get_contents("http://192.168.1.35:3480/data_request?id=action&output_format=xml&DeviceNum=3&serviceId=urn:upnp-org:serviceId:SwitchPower1&action=SetTarget&newTargetValue=0");
$c = curl_init();



//var_dump($ecartT);
//var_dump($T<$consigneT);
if ($T > $consigneT + $ecartT)
{
	$radiateurOFF;
}
if ($T < $consigneT)
{
	var_dump($consigneT);
	$radiateurON;
}

// ?>