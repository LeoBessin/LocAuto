<?php
include "../../phpFiles/DAO/ClientDao.php";
include "../../phpFiles/widgets/html-part.php";
$DaoClient = ClientDao::getInstance();
$DaoVoiture = VoitureDao::getInstance();
$DaoLocation = LocationDao::getInstance();
$DaoModele = CategorieDao::getInstance();
$DaoCategorie = CategorieDao::getInstance();
$DaoOption = OptionDao::getInstance();
$idVoiture = $_GET["id"];
$voiture = $DaoVoiture->getObjById($idVoiture);
$categorie = $voiture->getModele()->getCategorie();
$lastLocation = $DaoLocation->getLastObj();
$allClient = $DaoClient->getAllObj();
$allOption = $DaoOption->getAllObj();
fileStart("Insertion Location");
$dateToday = date("d/m/Y");
$dateTodayFormat = date("Y-m-d");
navBar("Parc");
?>
<div class="flex align-middle justify-center flex-col w-full items-center">
    <h1 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Ajout d'une location</h1>
    <form style="width: 66%" class="flex justify-center flex-col" action="waiting_location.php" method="post">
        <input type="hidden" name="id" aria-label="disabled input 2" class="mb-8 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed" value="<?= $lastLocation ==
        null
            ? 1
            : $lastLocation->getId() + 1 ?>" readonly>

        <label for="date-debut" class="block mb-2 text-sm font-medium text-gray-900 ">Date début</label>
        <input type="date" id="date-debut" name="date-debut" class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" min="<?= $dateTodayFormat ?>" required>

        <label for="date-fin" class="block mb-2 text-sm font-medium text-gray-900 ">Date Fin</label>
        <input id="date-fin" class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="date-fin" type="date" min="<?= $dateTodayFormat ?>" required>

        <label for="compteur-debut" class="block mb-2 text-sm font-medium text-gray-900 ">Kilométrage début</label>
        <input pattern="[0-0]{7}" aria-label="disabled input 2" class="mb-8 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed" name="compteur-debut" type="number" value="<?= $voiture->getCompteur() ?>" readonly>

        <label for="compteur-fin" class="block mb-2 text-sm font-medium text-gray-900 ">Kilométrage fin</label>
        <input pattern="[0-0]{7}" aria-label="disabled input 2" class="mb-8 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed" name="compteur-fin" type="number" value="<?= $voiture->getCompteur() ?>" readonly>

        <label for="id-voiture" class="block mb-2 text-sm font-medium text-gray-900 ">Immatriculation</label>
        <input type="text" name="id-voiture" aria-label="disabled input 2" class="mb-8 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed" value="<?= $idVoiture ?>" readonly>

        <label for="id-client" class="block mb-2 text-sm font-medium text-gray-900 ">Sélectioner un client</label>
        <select name="id-client" class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            <?php foreach ($allClient as $client) {
                echo '<option value="' .
                    $client->getId() .
                    '">' .
                    $client->getNom() .
                    " " .
                    $client->getPrenom() .
                    "</option>";
            } ?>
        </select>
        <div class="flex items-start mb-8 flex flex-col">
            <label for="option" class="block mb-2 text-sm font-medium text-gray-900 ">Choix option(s)</label>
            <select name="option[]" id="choixOption" class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" multiple>
                <?php
                $iOption = 1;
                foreach ($allOption as $option) {
                    echo '<option value="' .
                        $iOption .
                        '">' .
                        $option->getLibelle() .
                        " | " .
                        $option->getPrix() .
                        "€</option>";
                    $iOption++;
                }
                ?>
            </select>
            <label for="id-client" class="block mb-2 text-sm font-medium text-gray-900 ">Estimation du prix</label>
            <div class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <p>Nombre de jours : <span id="nbJour"></span></p>
                <p>Prix de la catégorie : <span id="categoriePrix"><?= $categorie->getPrix() ?></span>€</p>
                <p>Prix de la location :  <span id="prix"></span>€</p>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-8">Enregistrer une nouvelle location</button>
    </form>
</div>
<script>
    let spanNbJour = document.getElementById("nbJour");
    let spanPrix = document.getElementById("prix");
    let categoriePrix = document.getElementById("categoriePrix");
    setInterval(()=>{
        let dateDebut = document.getElementById("date-debut");
        let dateFin = document.getElementById("date-fin");
        if(dateDebut.value!==""&&dateFin.value!==""){
            const date1 = new Date(dateDebut.value);
            const date2 = new Date(dateFin.value);
            const diffTime = Math.abs(date2 - date1);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            spanNbJour.innerHTML = diffDays.toString();
            spanPrix.innerHTML = diffDays * parseInt(categoriePrix.innerText);

        }

    },1000)
</script>
<?php fileEnd(); ?>


