<?php
include("class/pData.class.php");
include("class/pDraw.class.php");
include("class/pImage.class.php");

include("parametrage.php");

include("requetes.php");


$resultatT = $mysqli->query($requeteTC);
$resultatTe = $mysqli->query($requeteTeM);


while ($row = $resultatT->fetch_array())
{
	/* Get the data from the query result */
	$date[]   = strtotime($row["heure"]);
	$heures[] = round($row["R"],1);
	//var_dump($temperature);
}

while ($row = $resultatTe->fetch_array())
{
	/* Get the data from the query result */
	//$date[]   = strtotime($row["heure"]);
	//$date[]   = strtotime($row["heure"]);
	$Text[] = round($row["T"],1);
	//var_dump($temperature);
}



$myData = new pData();

/* Save the data in the pData array */
$myData->addPoints($date,"heure");
$myData->addPoints($heures,"H");
$myData->addPoints($Text,"T");
 
$myData->setAbscissa("heure");
$myData->setXAxisDisplay(AXIS_FORMAT_DATE,"d");
$myData->setXAxisName("Date");

$myData->setSerieOnAxis("H",0);
$myData->setSerieOnAxis("T",1);
 
$myData->setAxisPosition(0,AXIS_POSITION_LEFT);
$myData->setAxisName(0,"heures");
$myData->setAxisUnit(0,"");

$myData->setAxisPosition(1,AXIS_POSITION_RIGHT);
$myData->setAxisName(1,"T");
$myData->setAxisUnit(1,"");

$myData->setAxisUnit(1,"");

$myPicture = new pImage(800,230,$myData);
$Settings = array("R"=>170, "G"=>183, "B"=>87, "Dash"=>1, "DashR"=>190, "DashG"=>203, "DashB"=>107);
$myPicture->drawFilledRectangle(0,0,800,230,$Settings);

$Settings = array("StartR"=>219, "StartG"=>231, "StartB"=>139, "EndR"=>1, "EndG"=>138, "EndB"=>68, "Alpha"=>50);
$myPicture->drawGradientArea(0,0,800,230,DIRECTION_VERTICAL,$Settings);

$myPicture->drawRectangle(0,0,799,229,array("R"=>0,"G"=>0,"B"=>0));

$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>50,"G"=>50,"B"=>50,"Alpha"=>20));

$myPicture->setFontProperties(array("FontName"=>"fonts/Forgotte.ttf","FontSize"=>14));
$TextSettings = array("Align"=>TEXT_ALIGN_MIDDLEMIDDLE
		, "R"=>255, "G"=>255, "B"=>255);
$myPicture->drawText(400,25,"Relevé sur les dernières 24h",$TextSettings);

$myPicture->setShadow(FALSE);
$myPicture->setGraphArea(50,50,745,190);
$myPicture->setFontProperties(array("R"=>0,"G"=>0,"B"=>0,"FontName"=>"fonts/pf_arma_five.ttf","FontSize"=>6));

$Settings = array("Pos"=>SCALE_POS_LEFTRIGHT
		, "Mode"=>SCALE_MODE_FLOATING
		, "LabelingMethod"=>LABELING_ALL
		, "GridR"=>255, "GridG"=>255, "GridB"=>255, "GridAlpha"=>50, "TickR"=>0, "TickG"=>0, "TickB"=>0, "TickAlpha"=>50, "LabelRotation"=>0, "CycleBackground"=>1, "DrawXLines"=>1, "DrawSubTicks"=>1, "SubTickR"=>255, "SubTickG"=>0, "SubTickB"=>0, "SubTickAlpha"=>50, "DrawYLines"=>ALL);
$myPicture->drawScale($Settings);

$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>50,"G"=>50,"B"=>50,"Alpha"=>10));

$Config = "";
$myPicture->drawSplineChart($Config);

$Config = array("FontR"=>0, "FontG"=>0, "FontB"=>0, "FontName"=>"fonts/pf_arma_five.ttf", "FontSize"=>6, "Margin"=>6, "Alpha"=>30, "BoxSize"=>5, "Style"=>LEGEND_NOBORDER
		, "Mode"=>LEGEND_HORIZONTAL
);
$myPicture->drawLegend(705,16,$Config);
$myPicture->Render("TC.png");
//$myPicture->stroke();



?>
