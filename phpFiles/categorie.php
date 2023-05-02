<?php
include "DAO/CategorieDao.php";
include "widgets/html-part.php";
$DaoCategorie = CategorieDao::getInstance();
$allCategorie = $DaoCategorie->getAllObj();
fileStart();
?>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Id
            </th>
            <th scope="col" class="px-6 py-3">
                Libelle
            </th>
            <th scope="col" class="px-6 py-3">
                Prix
            </th>
            <th scope="col" class="px-6 py-3">
                <span class="sr-only">Edit</span>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($allCategorie as $categorie){
            echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">';
            echo '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">'.$categorie->getId().'</th>';
            echo '<td class="px-6 py-4">'.$categorie->getLibelle().'</td>';
            echo '<td class="px-6 py-4">'.$categorie->getPrix().'€</td>';
            echo '<td class="px-6 py-4 text-right">
                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
            </td>';
        }
        ?>
        </tbody>
    </table>
</div>
<?php
fileEnd();
?>
