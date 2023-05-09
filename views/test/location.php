<?php
include "../../phpFiles/DAO/LocationDao.php";
include "../../phpFiles/widgets/html-part.php";
$DaoLocation = LocationDao::getInstance();
$allLocation = $DaoLocation->getAllObj();
$columnsNames = $DaoLocation->getAllColumnsNames();
fileStart();
navBar();
tableStart($columnsNames, true);
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
    echo '<td class="px-6 py-4 text-right">
                <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
            </td>';
}
tableEnd();
fileEnd();
?>

