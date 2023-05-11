<?php
include "../../phpFiles/DAO/VoitureDao.php";
include "../../phpFiles/widgets/html-part.php";
$immatriculation = $_GET["id"];
$DaoVoiture = VoitureDao::getInstance();
$voiture = $DaoVoiture->getObjById($immatriculation);
fileStart();
navBar();
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
                <img style="width: 65%" src="<?php echo $voiture->getModele()->getImage()?>" />

            </div>
        </div>
        <div>
            <h2 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Catégorie</h2>
            <div>
                <h3 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center"><?php echo $voiture->getModele()->getCategorie()->getLibelle() ?></h3>
                <p><?php echo $voiture->getModele()->getCategorie()->getPrix() ?>€/Semaine</p>

            </div>
        </div>

</div>

<?php
fileEnd();
?>

