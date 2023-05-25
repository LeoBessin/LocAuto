<?php
include "../../phpFiles/DAO/LocationDao.php";
include "../../phpFiles/widgets/html-part.php";
$DaoLocation = LocationDao::getInstance();
$allLocation = $DaoLocation->getAllObj();
$columnsNames = $DaoLocation->getAllColumnsNames();
fileStart("Location");
navBar("Tables");
echo '<h1 class="font font-bold text-gre-900 text-2xl py-4 flex justify-center">Table Location</h1>';
tableStart($columnsNames);
foreach ($allLocation as $location) {
    echo '<tr class="bg-white border-b hover:bg-gray-50">';
    echo '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">' .
        $location->getId() .
        "</th>";
    echo '<td class="px-6 py-4">' . $location->getDate_debut() . "</td>";
    echo '<td class="px-6 py-4">' . $location->getDate_fin() . "</td>";
    echo '<td class="px-6 py-4">' . $location->getCompteur_debut() . "</td>";
    echo '<td class="px-6 py-4">' . $location->getCompteur_fin() . "</td>";
    echo '<td class="px-6 py-4">' .
        $location->getVoiture()->getImmatriculation() .
        "</td>";
    echo '<td class="px-6 py-4">' . $location->getClient()->getId() . "</td>";
}
tableEnd();
fileEnd();
?>


