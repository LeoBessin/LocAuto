<?php
include "../../phpFiles/DAO/ClientDao.php";
include "../../phpFiles/widgets/html-part.php";
$DaoClient = ClientDao::getInstance();
$DaoTypes = Type_clientDao::getInstance();
$allTypes = $DaoTypes->getAllObj();
$lastClient = $DaoClient->getLastObj();
fileStart("Insertion Client");
navBar("Clients");
?>
<div class="flex align-middle justify-center flex-col w-full items-center">
    <h1 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Ajout d'un client</h1>
    <form style="width: 66%" class="flex justify-center flex-col" action="waiting_client.php" method="post">
        <input type="hidden" name="id" aria-label="disabled input 2" class="mb-8 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed" value="<?= $lastClient ==
        null
            ? 1
            : $lastClient->getId() + 1 ?>" readonly>

        <label for="lastName" class="block mb-2 text-sm font-medium text-gray-900 ">Nom</label>
        <input class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="lastName" type="text" placeholder="Musk" required>

        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Prénom</label>
        <input class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="name" type="text" placeholder="Elon" required>

        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 ">Adresse</label>
        <input class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="address" type="text" placeholder="1 Rocket Rd.Hawthorne, CA 90250" required>
        <label for="idTypeClient" class="block mb-2 text-sm font-medium text-gray-900 ">Sélectioner un type client</label>
        <select name="idTypeClient" class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            <?php foreach ($allTypes as $type) {
                echo '<option value="' .
                    $type->getId() .
                    '">' .
                    $type->getLibelle() .
                    "</option>";
            } ?>
        </select>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-8">Enregistrer un nouveau client</button>
    </form>

</div>

<?php fileEnd(); ?>


