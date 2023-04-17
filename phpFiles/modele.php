<?php
include "DAO/ModeleDao.php";
$DaoModele = ModeleDao::getInstance();
$allModele = $DaoModele->getAllObj();
foreach ($allModele as $modele){
    $imgPath = $modele->getImage();
    echo $modele->getId();
    echo $modele->getLibelle();
    echo "<img src='$imgPath'/>";
    echo $modele->getMarque()->getId();
    echo $modele->getMarque()->getLibelle();
    echo $modele->getCategorie()->getId();
    echo $modele->getCategorie()->getLibelle();
    echo $modele->getCategorie()->getPrix();
    echo "<br>";
}
?>