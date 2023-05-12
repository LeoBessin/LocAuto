<?php
include "../../phpFiles/DAO/ClientDao.php";
include "../../phpFiles/DAO/LocationDao.php";
include "../../phpFiles/widgets/html-part.php";
$id = $_GET["id"];
$DaoClient = ClientDao::getInstance();
$DaoLocation = LocationDao::getInstance();
$client = $DaoClient->getObjById($id);
$locationClient = $DaoLocation->getAllObjByIdClient($client->getId());
fileStart();
navBar();
?>
<h1 class="font font-bold text-gre-900 text-4xl py-3 flex justify-center">Détail du client 🔍</h1>
<div class="flex flex-col align-middle justify-center gap-x-6">
    <h2 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Id : <?php echo $client->getId() ?></h2>
    <div class="flex flex-row gap-x-6 self-center">
        <h2 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Nom : <?php echo $client->getNom() ?></h2>
        <h2 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Prénom : <?php echo $client->getPrenom() ?></h2>

    </div>
    <div class=" flex items-center flex-col">
        <h2 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Adresse & type client</h2>
        <div class="flex flex-row gap-x-6">
            <h3 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center"><?php echo $client->getAdresse() ?></h3>
            <h3 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center"><?php echo $client->getType_client()->getLibelle() ?></h3>

        </div>
    </div>
    <div class="flex flex-col align-middle justify-center w-2/3 self-center">
        <h2 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Location(s)</h2>

        <?php
        foreach ($locationClient as $location){
            tableStart($DaoLocation->getAllColumnsNames());
            echo '<tr class="bg-white border-b hover:bg-gray-50">';
            echo '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">' .
                $location->getId() .
                "</th>";
            echo '<td class="px-6 py-4">' . $location->getDate_debut() . "</td>";
            echo '<td class="px-6 py-4">' . $location->getDate_fin() . "</td>";
            echo '<td class="px-6 py-4">' . $location->getCompteur_debut() . "</td>";
            echo '<td class="px-6 py-4">' . $location->getCompteur_fin() . "</td>";
            echo '<td class="px-6 py-4">' .
                $location->getVoiture()->getImmatriculation() .
                "</td>";
            echo '<td class="px-6 py-4">' . $location->getClient()->getId() . "</td>";
            tableEnd();
        }
        ?>
    </div>

</div>

<?php
fileEnd();
?>

