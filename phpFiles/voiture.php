<?php
    include "DAO/VoitureDao.php";
    $DaoVoiture = VoitureDao::getInstance();

    $DaoVoiture->getAllCars();