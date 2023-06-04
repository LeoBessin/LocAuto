<?php
include "../../phpFiles/widgets/html-part.php";
include "../../phpFiles/DAO/VoitureDao.php";
$DaoVoiture = VoitureDao::getInstance();
fileStart("Acceuil");
navBar("Acceuil");
$allVoiture = $DaoVoiture->getAllObjAvailable();
?>
    <h1 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Voiture disponible à la location :</h1>





<?php
fileEnd();
?>