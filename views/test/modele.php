<?php
include "../../phpFiles/DAO/ModeleDao.php";
include "../../phpFiles/widgets/html-part.php";
$DaoModele = ModeleDao::getInstance();
$allModele = $DaoModele->getAllObj();
$columnsNames = $DaoModele->getAllColumnsNames();
fileStart();
navBar();
tableStart($columnsNames);
foreach ($allModele as $modele) {
    $imgPath = $modele->getImage();
    echo '<tr class="bg-white border-b hover:bg-gray-50 ">';
    echo '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">' .
        $modele->getId() .
        "</th>";
    echo '<td class="px-6 py-4">' . $modele->getLibelle() . "</td>";
    echo '<td class="px-6 py-4"><img class="rounded-full" src="' .
        $imgPath .
        '"/></td>';
    echo '<td class="px-6 py-4">' . $modele->getMarque()->getId() . "</td>";
    echo '<td class="px-6 py-4">' . $modele->getCategorie()->getId() . "</td>";
}
tableEnd();
fileEnd();
?>

