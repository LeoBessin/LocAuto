<?php
include "../../phpFiles/DAO/ClientDao.php";
include "../../phpFiles/widgets/html-part.php";
$DaoClient = ClientDao::getInstance();
$allClient = $DaoClient->getAllObj();
fileStart();
navBar();
?>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
        <tr>
            <th scope="col" class="px-6 py-3">
                Id
            </th>
            <th scope="col" class="px-6 py-3">
                Nom
            </th>
            <th scope="col" class="px-6 py-3">
                Prénom
            </th>
            <th scope="col" class="px-6 py-3">
                Adresse
            </th>
            <th scope="col" class="px-6 py-3">
                Type Client
            </th>
            <th scope="col" class="px-6 py-3">
                <span class="sr-only">Edit</span>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($allClient as $client) {
            echo '<tr class="bg-white border-b hover:bg-gray-50 ">';
            echo '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">' .
                $client->getId() .
                "</th>";
            echo '<td class="px-6 py-4">' . $client->getNom() . "</td>";
            echo '<td class="px-6 py-4">' . $client->getPrenom() . "</td>";
            echo '<td class="px-6 py-4">' . $client->getAdresse() . "</td>";
            echo '<td class="px-6 py-4">' .
                $client->getType_client()->getLibelle() .
                "</td>";
            echo '<td class="px-6 py-4 text-right">
                <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
            </td>';
        }
        tableEnd();
        fileEnd();
        ?>

