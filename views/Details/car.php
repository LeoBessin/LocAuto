<?php
include "../../phpFiles/DAO/VoitureDao.php";
include "../../phpFiles/widgets/html-part.php";
$immatriculation = $_GET["id"];
$DaoVoiture = VoitureDao::getInstance();
$DaoLocation = LocationDao::getInstance();
$voiture = $DaoVoiture->getObjById($immatriculation);
$allLocation = $DaoLocation->getAllObjByImmatriculation($voiture->getImmatriculation());
fileStart("Voiture détails");
navBar("Parc");
?>
<h1 class="font font-bold text-gre-900 text-4xl py-3 flex justify-center">Détail de la voiture 🔍</h1>
<div class="flex flex-row align-middle justify-center">
    <h2 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Immatriculation : <?php echo $voiture->getImmatriculation() ?></h2>
    <h2 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Compteur : <?php echo $voiture->getCompteur() ?>km</h2>

</div>

<div class="flex justify-center align-middle flex-row gap-x-6">
        <div class="">
            <h2 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Marque & modèle</h2>
            <div>
                <h3 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center"><?php echo $voiture->getModele()->getMarque()->getLibelle().' '.$voiture->getModele()->getLibelle() ?></h3>
                <img style="width: 65%" src="<?php echo $voiture->getModele()->getImage()?>"  alt="car image"/>

            </div>
        </div>
        <div>
            <h2 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Catégorie</h2>
            <div>
                <h3 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center"><?php echo $voiture->getModele()->getCategorie()->getLibelle() ?></h3>
                <p><?php echo $voiture->getModele()->getCategorie()->getPrix() ?>€/Semaine</p>

            </div>
        </div>
    <div class="flex flex-col align-middle justify-center w-1/3 self-center">


        <?php
        if(sizeof($allLocation)>0){
            echo '<h2 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Location(s)</h2>';
            foreach ($allLocation as $location){
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

        }
        ?>
    </div>
    <div>
        <a class="p-4 rounded-lg mt-8 text-white font-bold" style="background: #06D6A0" href="../Insert/locations.php?id=<?php echo $voiture->getImmatriculation()?>" >Louer</a>
    </div>
    <div>
        <button class="p-4 rounded-lg mt-8 text-white font-bold" onclick="location.href='../Delete/waiting_car.php?idVoiture=<?php echo $voiture->getImmatriculation()?>'" style="background: #EF476F"  ><svg xmlns="http://www.w3.org/2000/svg" width="24px" viewBox="0 0 32 32"><defs><style>.cls-1{fill:#ffffff;}</style></defs><title/><g data-name="Layer 17" id="Layer_17"><path class="cls-1" d="M24,31H8a3,3,0,0,1-3-3V9A1,1,0,0,1,7,9V28a1,1,0,0,0,1,1H24a1,1,0,0,0,1-1V9a1,1,0,0,1,2,0V28A3,3,0,0,1,24,31Z"/><path class="cls-1" d="M28,7H4A1,1,0,0,1,4,5H28a1,1,0,0,1,0,2Z"/><path class="cls-1" d="M20,7a1,1,0,0,1-1-1V3H13V6a1,1,0,0,1-2,0V2a1,1,0,0,1,1-1h8a1,1,0,0,1,1,1V6A1,1,0,0,1,20,7Z"/><path class="cls-1" d="M16,26a1,1,0,0,1-1-1V11a1,1,0,0,1,2,0V25A1,1,0,0,1,16,26Z"/><path class="cls-1" d="M21,24a1,1,0,0,1-1-1V13a1,1,0,0,1,2,0V23A1,1,0,0,1,21,24Z"/><path class="cls-1" d="M11,24a1,1,0,0,1-1-1V13a1,1,0,0,1,2,0V23A1,1,0,0,1,11,24Z"/></g></svg> </button>

    </div>

</div>

<?php
fileEnd();
?>
