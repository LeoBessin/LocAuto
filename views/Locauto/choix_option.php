<?php
include "../../phpFiles/DAO/Choix_optionDao.php";
include "../../phpFiles/widgets/html-part.php";
$DaoChoix_option = Choix_optionDao::getInstance();
$allChoix_option = $DaoChoix_option->getAllObj();
$columnsNames = $DaoChoix_option->getAllColumnsNames();
fileStart("Choix option");
navBar("Tables");
echo '<h1 class="font font-bold text-gre-900 text-2xl py-4 flex justify-center">Table Type client</h1>';
tableStart($columnsNames);
foreach ($allChoix_option as $choix_option) {
    echo '<tr class="bg-white border-b hover:bg-gray-50">';
    echo '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">' .
        $choix_option->getIdOption() .
        "</th>";
    echo '<td class="px-6 py-4">' . $choix_option->getIdLocation() . "</td>";
}
tableEnd();
fileEnd();
?>


