<?php
include "../../phpFiles/widgets/html-part.php";
include "../../phpFiles/DAO/LocationDao.php";

$DaoLocation = LocationDao::getInstance();
$lastLoc = $DaoLocation->getLastObj();
$arrayName = $DaoLocation->getAllColumnsNames();

fileStart("test");
navBar("Acceuil");
tableStart($arrayName);
echo '<tr class="bg-white border-b hover:bg-gray-50">';
echo '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">' .
       $lastLoc->getId() .
       "</th>";
   echo '<td class="px-6 py-4">' . $lastLoc->getDate_debut() . "</td>";
   echo '<td class="px-6 py-4">' . $lastLoc->getDate_fin() . "</td>";
   echo '<td class="px-6 py-4">' . $lastLoc->getCompteur_debut() . "</td>";
   echo '<td class="px-6 py-4">' . $lastLoc->getCompteur_fin() . "</td>";
   echo '<td class="px-6 py-4">' .
       $lastLoc->getVoiture()->getImmatriculation() .
       "</td>";
   echo '<td class="px-6 py-4">' . $lastLoc->getClient()->getId() . "</td>";
tableEnd();

locationDetails($lastLoc,"car");
?>



<?php

fileEnd();
?>
