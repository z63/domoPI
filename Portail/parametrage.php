<?php
//Paramétrage

$HOTE_MYSQL = '192.168.1.7';
$USER_MYSQL = 'robot_domo';
$PASS_MYSQL = 'robot_domo';
$BASE_MYSQL = 'robot_domo';


$mysqli = new mysqli($HOTE_MYSQL,$USER_MYSQL,$PASS_MYSQL,$BASE_MYSQL);
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
