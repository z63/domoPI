<?php
function GetServerStatus($site, $port)
{
	$status = array("DOWN", "UP");
	$fp = @fsockopen($site, $port, $errno, $errstr, 2);
	if (!$fp) {
		return $status[0];
	} else
	{ return $status[1];
	}
}

?>