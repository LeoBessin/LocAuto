<?php
include "DAO/MarqueDao.php";
$DaoMarque = MarqueDao::getInstance();
$allMarque = $DaoMarque->getAllObj();
foreach ($allMarque as $marque){
    echo $marque->getId();
    echo $marque->getLibelle();
    echo "<br>";
}
?>