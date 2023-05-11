<?php
include "../../phpFiles/DAO/Type_clientDao.php";
include "../../phpFiles/widgets/html-part.php";
$DaoType_client = Type_clientDao::getInstance();
$allType_client = $DaoType_client->getAllObj();
$columnsNames = $DaoType_client->getAllColumnsNames();
fileStart();
navBar();
echo '<h1 class="font font-bold text-gre-900 text-2xl py-4 flex justify-center">Table Type client</h1>';
tableStart($columnsNames);
foreach ($allType_client as $type_client) {
    echo '<tr class="bg-white border-b hover:bg-gray-50">';
    echo '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">' .
        $type_client->getId() .
        "</th>";
    echo '<td class="px-6 py-4">' . $type_client->getLibelle() . "</td>";
}
tableEnd();
fileEnd();
?>


