<?php
include "DAO/ModeleDao.php";
include "widgets/html-part.php";
$DaoModele = ModeleDao::getInstance();
$allModele = $DaoModele->getAllObj();
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
                Image
            </th>
            <th scope="col" class="px-6 py-3">
                Marque
            </th>
            <th scope="col" class="px-6 py-3">
                Catégorie
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
        foreach ($allModele as $modele){
            $imgPath = $modele->getImage();
            echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">';
            echo '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">'.$modele->getId().'</th>';
            echo '<td class="px-6 py-4">'.$modele->getLibelle().'</td>';
            echo '<td class="px-6 py-4"><img class="rounded-full" src="'.$imgPath.'"/></td>';
            echo '<td class="px-6 py-4">'.$modele->getMarque()->getLibelle().'</td>';
            echo '<td class="px-6 py-4">'.$modele->getCategorie()->getLibelle().'</td>';
            echo '<td class="px-6 py-4">'.$modele->getCategorie()->getPrix().'€</td>';
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

