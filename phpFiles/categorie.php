<?php
include "DAO/CategorieDao.php";
$DaoCategorie = CategorieDao::getInstance();
$allCategorie = $DaoCategorie->getAllObj();
foreach ($allCategorie as $categorie){
    echo $categorie->getId();
    echo $categorie->getLibelle();
    echo $categorie->getPrix();
    echo "<br>";
}
?>