<?php
include "../../phpFiles/DAO/LocationDao.php";
include "../../phpFiles/widgets/html-part.php";
$DaoLocation = LocationDao::getInstance();
$id = $_GET["idLocation"];
$location = $DaoLocation->getObjById($id);
fileStart("Modification location");
navBar("Client");
?>
<div class="flex align-middle justify-center flex-col w-full items-center">
    <h1 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Modification de la location :</h1>
    <form style="width: 66%" class="flex justify-center flex-col" action="waiting_location.php" method="post">
        <input type="hidden" name="id" aria-label="disabled input 2" class="mb-8 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed" value="<?= $id ?>" readonly>
        <label for="date-fin" class="block mb-2 text-sm font-medium text-gray-900 ">Date Fin</label>
        <input id="date-fin" class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="date-fin" type="date" min="<?= $location->getDate_debut() ?>">
        <label for="compteur-fin" class="block mb-2 text-sm font-medium text-gray-900 ">Kilométrage fin</label>
        <input pattern="[0-0]{7}"  class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" min="<?= $location->getCompteur_debut() ?>" name="compteur-fin" type="number" value="<?= $location->getCompteur_fin() ?>">

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-8">Modifier la location</button>
    </form>

</div>

<?php fileEnd();
?>
