<?php
    include "DAO/VoitureDao.php";
    $DaoVoiture = VoitureDao::getInstance();
    $allVoiture = $DaoVoiture->getAllObj();
    foreach ($allVoiture as $voiture){
        $imgPath = $voiture->getModele()->getImage();
        echo $voiture->getImmatriculation();
        echo $voiture->getCompteur();
        echo "<img src='$imgPath'/>";
        echo $voiture->getModele()->getLibelle();
        echo $voiture->getModele()->getMarque()->getLibelle();
        echo $voiture->getModele()->getCategorie()->getLibelle();
        echo $voiture->getModele()->getCategorie()->getPrix();
        echo "<br>";
    }