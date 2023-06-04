<?php
include "../../phpFiles/widgets/html-part.php";
include "../../phpFiles/DAO/ClientDao.php";
$DaoClient = ClientDao::getInstance();
$DaoLocation = LocationDao::getInstance();
$idClient = $_GET['idClient'];
$client = $DaoClient->getObjById($idClient);
$allLocation = $DaoLocation->getAllObjByIdClient($idClient);
fileStart("Supression Client");
navBar("Client");
?>
<h1 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Voulez vous supprimer le client suivant ?</h1>
<div class="flex flex-col align-middle justify-center w-2/3 self-center">
    <?php
    tableStart($DaoClient->getAllColumnsNames());
        echo '<tr class="bg-white border-b hover:bg-gray-50 ">';
        echo '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">' .
            $client->getId() .
            "</th>";
        echo '<td class="px-6 py-4">' . $client->getNom() . "</td>";
        echo '<td class="px-6 py-4">' . $client->getPrenom() . "</td>";
        echo '<td class="px-6 py-4">' . $client->getAdresse() . "</td>";
        echo '<td class="px-6 py-4">' .
            $client->getType_client()->getLibelle() .
            "</td>";
    tableEnd();

    if(sizeof($allLocation)>0){
        echo '<h2 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Cette opération supprimera les locations ci-dessous :</h2>';
        foreach ($allLocation as $location){
            locationDetails($location,"car",false);
        }

    }

    ?>
    <a class="p-4 rounded-lg mt-8 text-white font-bold w-1/6 flex flex-row justify-center align-middle" style="background: #EF476F" href="../Delete/clients.php?idClient=<?php echo $client->getId()?>" >Supprimer</a>

</div>
<?php
fileEnd();
?>
