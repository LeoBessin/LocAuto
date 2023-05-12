<?php
include "../../phpFiles/DAO/ModeleDao.php";
include "../../phpFiles/widgets/html-part.php";
include "../../phpFiles/tools/immatriculation.php";
$DaoModele = ModeleDao::getInstance();
$allModele = $DaoModele->getAllObj();
fileStart();
navBar();?>
<div class="flex align-middle justify-center flex-col w-full items-center">
    <h1 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Ajout d'une voiture</h1>
    <form style="width: 66%" class="flex justify-center flex-col" action="waiting_car.php" method="post">
        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Plaque d'immatriculation</label>
        <input type="text" name="immatriculation" aria-label="disabled input 2" class="mb-8 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed" value="<?php echo create_id_car() ?>" readonly>
        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Sélectioner un modèle</label>
        <select name="idModele" class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            <?php
            foreach ($allModele as $modele){
                echo '<option value="'.$modele->getId().'">'.$modele->getMarque()->getLibelle().' - '.$modele->getLibelle().'</option>';
            }
            ?>
        </select>
        <label for="compteur" class="block mb-2 text-sm font-medium text-gray-900 ">Kilométrage</label>
        <input pattern="[0-0]{7}" class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="compteur" type="number" placeholder="0-1,000,000" required>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Register new car</button>
    </form>

</div>

<?php
fileEnd();
?>


