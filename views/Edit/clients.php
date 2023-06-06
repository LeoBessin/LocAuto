<?php
include "../../phpFiles/DAO/ClientDao.php";
include "../../phpFiles/widgets/html-part.php";
$DaoClient = ClientDao::getInstance();
$DaoTypes = Type_clientDao::getInstance();
$allTypes = $DaoTypes->getAllObj();
$id = $_GET["idClient"];
$client = $DaoClient->getObjById($id);
fileStart("Modification client");
navBar("Clients");
?>
<div class="flex align-middle justify-center flex-col w-full items-center">
    <h1 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Modification du client :</h1>
    <form style="width: 66%" class="flex justify-center flex-col" action="waiting_client.php" method="post">
        <input type="hidden" name="id" aria-label="disabled input 2" class="mb-8 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed" value="<?= $id ?>" readonly>
        <label for="lastName" class="block mb-2 text-sm font-medium text-gray-900 ">Nom</label>
        <input class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="lastName" type="text" placeholder="<?= $client->getNom() ?>">

        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Prénom</label>
        <input class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="name" type="text" placeholder="<?= $client->getPrenom() ?>">

        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 ">Adresse</label>
        <input class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="address" type="text" placeholder="<?= $client->getAdresse() ?>">
        <label for="idTypeClient" class="block mb-2 text-sm font-medium text-gray-900 ">Sélectioner un type client</label>
        <select name="idTypeClient" class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <?php foreach ($allTypes as $type) {
                echo "<option " .
                    ($type == $client->getType_client()
                        ? "selected=selected"
                        : "") .
                    ' value="' .
                    $type->getId() .
                    '">' .
                    $type->getLibelle() .
                    "</option>";
            } ?>
        </select>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-8">Modifier le client</button>
    </form>

</div>

<?php fileEnd();
?>
