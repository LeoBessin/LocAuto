<?php
include "../../phpFiles/DAO/CategorieDao.php";
include "../../phpFiles/widgets/html-part.php";
$DaoCategorie = CategorieDao::getInstance();
$allCategorie = $DaoCategorie->getAllObj();
$columnsNames = $DaoCategorie->getAllColumnsNames();
fileStart();
navBar();
echo '<h1 class="font font-bold text-gre-900 text-2xl py-4 flex justify-center">Table Catégorie</h1>';
tableStart($columnsNames);
foreach ($allCategorie as $categorie) {
    echo '<tr class="bg-white border-b hover:bg-gray-50">';
    echo '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">' .
        $categorie->getId() .
        "</th>";
    echo '<td class="px-6 py-4">' . $categorie->getLibelle() . "</td>";
    echo '<td class="px-6 py-4">' . $categorie->getPrix() . "€</td>";
    echo "</tr>";
}
tableEnd();
fileEnd();
?>
