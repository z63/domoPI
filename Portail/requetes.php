<?php
// Requete pour la Tint sur les dernières 24h
$requeteTJ = "
SELECT date_format( timestampHistorique, '%Y-%m-%d %H:00:00' ) AS heure, avg( valeur ) AS T
FROM historique
WHERE entite = 'Tint'
AND timestampHistorique
BETWEEN CURRENT_TIMESTAMP - INTERVAL 1
DAY AND CURRENT_TIMESTAMP
GROUP BY heure
LIMIT 0 , 30";

// Requete pour la Hint sur les dernières 24h
$requeteHJ = "
SELECT date_format( timestampHistorique, '%Y-%m-%d %H:00:00' ) AS heure, avg( valeur ) AS H
FROM historique
WHERE entite = 'Hint'
AND timestampHistorique
BETWEEN CURRENT_TIMESTAMP - INTERVAL 1
DAY AND CURRENT_TIMESTAMP
GROUP BY heure
LIMIT 0 , 30";


// Requete pour la Tint sur le dernier mois
$requeteTM = "
SELECT date_format( timestampHistorique, '%Y-%m-%d 00:00:00' ) AS heure, avg( valeur ) AS T
FROM historique
WHERE entite = 'Tint'
AND timestampHistorique
BETWEEN CURRENT_TIMESTAMP - INTERVAL 1
MONTH AND CURRENT_TIMESTAMP
GROUP BY heure
LIMIT 0 , 30";

// Requete pour la Hint sur le dernier mois
$requeteHM = "
SELECT date_format( timestampHistorique, '%Y-%m-%d 00:00:00' ) AS heure, avg( valeur ) AS H
FROM historique
WHERE entite = 'Hint'
AND timestampHistorique
BETWEEN CURRENT_TIMESTAMP - INTERVAL 1
MONTH AND CURRENT_TIMESTAMP
GROUP BY heure
LIMIT 0 , 30";

// Requete pour la T courante
$requeteT = "
SELECT valeur AS T
FROM historique
WHERE entite = 'Tint'
ORDER BY `timestampHistorique` DESC
LIMIT 0 , 1";

// Requete pour la T courante
$requeteH = "
SELECT valeur AS H, 
date_format( timestampHistorique, '%H:%i' ) AS Heure,
 timestampHistorique,
CURRENT_TIMESTAMP
FROM historique
WHERE entite = 'Hint'
ORDER BY `timestampHistorique` DESC
LIMIT 0 , 1";

// Requete pour les paramètres
$requeteParametre = "
SELECT *
FROM parametre";

//Requete pour le temps de chauffe sur le mois
$requeteTC = "
SELECT date_format( timestampHistorique, '%Y-%m-%d 00:00:00' ) AS heure,sum( valeur )*5/60 AS R
FROM historique
WHERE entite = 'EtatRadiateur'
AND timestampHistorique
BETWEEN CURRENT_TIMESTAMP - INTERVAL 1
MONTH AND CURRENT_TIMESTAMP
GROUP BY heure";

//Requete pour la Text le mois
$requeteTeM = "
SELECT date_format( timestampHistorique, '%Y-%m-%d 00:00:00' ) AS heure, avg( valeur ) AS T
FROM historique
WHERE entite = 'Text'
AND timestampHistorique
BETWEEN CURRENT_TIMESTAMP - INTERVAL 1
MONTH AND CURRENT_TIMESTAMP
GROUP BY heure";
?>