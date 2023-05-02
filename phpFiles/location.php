<?php
include "DAO/LocationDao.php";
include "widgets/html-part.php";
$DaoLocation = LocationDao::getInstance();
$allLocation = $DaoLocation->getAllObj();
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
                Date début
            </th>
            <th scope="col" class="px-6 py-3">
                Date fin
            </th>
            <th scope="col" class="px-6 py-3">
                Compteur début
            </th>
            <th scope="col" class="px-6 py-3">
                Compteur fin
            </th>
            <th scope="col" class="px-6 py-3">
                Immatriculation
            </th>
            <th scope="col" class="px-6 py-3">
                Prénom
            </th>
            <th scope="col" class="px-6 py-3">
                Nom
            </th>
            <th scope="col" class="px-6 py-3">
                Option(s)
                <br/>
                <div class="text-[0.60rem]">
                    Libelle - Prix
                </div>
            </th>
            <th scope="col" class="px-6 py-3">
                <span class="sr-only">Edit</span>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($allLocation as $location){
            echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">';
            echo '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">'.$location->getId().'</th>';
            echo '<td class="px-6 py-4">'.$location->getDate_debut().'</td>';
            echo '<td class="px-6 py-4">'.$location->getDate_fin().'</td>';
            echo '<td class="px-6 py-4">'.$location->getCompteur_debut().'</td>';
            echo '<td class="px-6 py-4">'.$location->getCompteur_fin().'</td>';
            echo '<td class="px-6 py-4">'.$location->getVoiture()->getImmatriculation().'</td>';
            echo '<td class="px-6 py-4">'.$location->getClient()->getPrenom().'</td>';
            echo '<td class="px-6 py-4">'.$location->getClient()->getNom().'</td>';
            echo '<td class="px-6 py-4">';
            foreach ($location->getOption() as $option){
                echo $option->getLibelle().' '.$option->getPrix().'€';
                echo "<br/>";
            }
            echo '</td>';
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


