<?php
include "../../phpFiles/DAO/MarqueDao.php";
include "../../phpFiles/widgets/html-part.php";
$DaoMarque = MarqueDao::getInstance();
$allMarque = $DaoMarque->getAllObj();
$columnsNames = $DaoMarque->getAllColumnsNames();
fileStart();
navBar();
tableStart($columnsNames);
foreach ($allMarque as $marque) {
    echo '<tr class="bg-white border-b hover:bg-gray-50 ">';
    echo '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">' .
        $marque->getId() .
        "</th>";
    echo '<td class="px-6 py-4">' . $marque->getLibelle() . "</td>";
}
tableEnd();
fileEnd();
?>

