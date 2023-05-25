<?php
include "../../phpFiles/DAO/OptionDao.php";
include "../../phpFiles/widgets/html-part.php";
$DaoOption = OptionDao::getInstance();
$allOption = $DaoOption->getAllObj();
$columnsNames = $DaoOption->getAllColumnsNames();
fileStart("Option");
navBar("Tables");
echo '<h1 class="font font-bold text-gre-900 text-2xl py-4 flex justify-center">Table Option</h1>';
tableStart($columnsNames);
foreach ($allOption as $option) {
    echo '<tr class="bg-white border-b hover:bg-gray-50 ">';
    echo '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">' .
        $option->getId() .
        "</th>";
    echo '<td class="px-6 py-4">' . $option->getLibelle() . "</td>";
    echo '<td class="px-6 py-4">' . $option->getPrix() . "€</td>";
}
tableEnd();
fileEnd();
?>
