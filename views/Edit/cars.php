<?php
include "../../phpFiles/DAO/VoitureDao.php";
include "../../phpFiles/widgets/html-part.php";
$DaoVoiture = VoitureDao::getInstance();
$immatriculation = $_GET["idVoiture"];
$voiture = $DaoVoiture->getObjById($immatriculation);
fileStart("Modification voiture");
navBar("Parc");
?>
<div class="flex align-middle justify-center flex-col w-full items-center">
    <h1 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Modification de la voiture :</h1>
    <form style="width: 66%" class="flex justify-center flex-col" action="waiting_car.php" method="post">
        <input type="hidden" name="id" aria-label="disabled input 2" class="mb-8 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed" value="<?= $immatriculation ?>" readonly>
        <label for="compteur" class="block mb-2 text-sm font-medium text-gray-900 ">Kilométrage</label>
        <input pattern="[0-0]{7}" min="0" class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="compteur" type="number" value="<?= $voiture->getCompteur() ?>" " required>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-8">Modifier la voiture</button>
    </form>

</div>

<?php fileEnd();
?>
