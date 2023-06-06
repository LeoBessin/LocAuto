<?php
include "../../phpFiles/DAO/ClientDao.php";
include "../../phpFiles/widgets/html-part.php";
$DaoClient = ClientDao::getInstance();
$allClient = $DaoClient->getAllObj();
$columnsNames = $DaoClient->getAllColumnsNames();
fileStart("Client");
navBar("Tables");
echo '<h1 class="font font-bold text-gre-900 text-2xl py-4 flex justify-center">Table Client</h1>';
tableStart($columnsNames);
foreach ($allClient as $client) {
    echo '<tr class="bg-white border-b hover:bg-gray-50 ">
<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">' .
        $client->getId() .
        "</th>";
    echo '<td class="px-6 py-4">' . $client->getNom() . "</td>";
    echo '<td class="px-6 py-4">' . $client->getPrenom() . "</td>";
    echo '<td class="px-6 py-4">' . $client->getAdresse() . "</td>";
    echo '<td class="px-6 py-4">' .
        $client->getType_client()->getLibelle() .
        "</td></tr>";
}
tableEnd();
fileEnd();
?>


