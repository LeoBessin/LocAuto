<?php
    include "DAO/OptionDao.php";
    $DaoVoiture = OptionDao::getInstance();
    $allOption = $DaoVoiture->getAllObj();
    foreach ($allOption as $option){
        echo $option->getId();
        echo $option->getLibelle();
        echo $option->getPrix();
        echo "<br>";
    }
?>