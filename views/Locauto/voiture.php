<?php
include "../../phpFiles/DAO/VoitureDao.php";
include "../../phpFiles/widgets/html-part.php";
$DaoVoiture = VoitureDao::getInstance();
$allVoiture = $DaoVoiture->getAllObj();
$columnsNames = $DaoVoiture->getAllColumnsNames();
fileStart("Voiture");
navBar("Tables");
echo '<h1 class="font font-bold text-gre-900 text-2xl py-4 flex justify-center">Table Voiture</h1>';
tableStart($columnsNames);
foreach ($allVoiture as $voiture) {
    $imgPath = $voiture->getModele()->getImage();
    echo '<tr class="bg-white border-b hover:bg-gray-50">';
    echo '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">' .
        $voiture->getImmatriculation() .
        "</th>";
    echo '<td class="px-6 py-4">' . $voiture->getCompteur() . " km</td>";
    echo '<td class="px-6 py-4">' . $voiture->getModele()->getId() . "</td>";
}
tableEnd();
fileEnd();
?>

