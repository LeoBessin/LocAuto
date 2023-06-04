<?php
include "../../phpFiles/DAO/VoitureDao.php";
include "../../phpFiles/widgets/html-part.php";
$DaoVoiture = VoitureDao::getInstance();
$DaoLocation = LocationDao::getInstance();
$idVoiture = $_GET['idVoiture'];
$voiture = $DaoVoiture->getObjById($idVoiture);
$allLocation = $DaoLocation->getAllObjByImmatriculation($voiture->getImmatriculation());
fileStart("Supression Voiture");
navBar("Parc");
?>
<h1 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Voulez vous supprimer la voiture suivante ?</h1>
<div class="flex flex-col align-middle justify-center w-2/3 self-center">
<?php
tableStart($DaoVoiture->getAllColumnsNames());
$imgPath = $voiture->getModele()->getImage();
echo '<tr class="bg-white border-b hover:bg-gray-50">';
echo '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">' .
    $voiture->getImmatriculation() .
    "</th>";
echo '<td class="px-6 py-4">' . $voiture->getCompteur() . " km</td>";
echo '<td class="px-6 py-4">' . $voiture->getModele()->getId() . "</td>";
tableEnd();

if(sizeof($allLocation)>0){
    echo '<h2 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Cette opération supprimera les locations ci-dessous :</h2>';
    foreach ($allLocation as $location){
        locationDetails($location,"client",false);
    }

}

?>
    <a class="p-4 rounded-lg mt-8 text-white font-bold w-1/6 flex flex-row justify-center align-middle" style="background: #EF476F" href="../Delete/car.php?idVoiture=<?php echo $voiture->getImmatriculation()?>" >Supprimer</a>

</div>
<?php
fileEnd();
?>
