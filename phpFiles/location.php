<?php
include "DAO/LocationDao.php";
$DaoLocation = LocationDao::getInstance();
$allLocation = $DaoLocation->getAllObj();
foreach ($allLocation as $location){
    echo $location->getId();
    echo $location->getDate_debut();
    echo $location->getDate_fin();
    echo $location->getCompteur_debut();
    echo $location->getCompteur_fin();
    echo $location->getVoiture()->getImmatriculation();
    echo $location->getClient()->getPrenom();
    echo $location->getClient()->getNom();
    foreach ($location->getOption() as $option){
        echo $option->getLibelle();
        echo $option->getPrix();
    }
    echo "<br>";
}
?>