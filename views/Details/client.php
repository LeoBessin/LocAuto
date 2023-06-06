<?php
include "../../phpFiles/DAO/ClientDao.php";
include "../../phpFiles/widgets/html-part.php";
$id = $_GET["id"];
$DaoClient = ClientDao::getInstance();
$DaoLocation = LocationDao::getInstance();
$client = $DaoClient->getObjById($id);
$locationClient = $DaoLocation->getAllObjByIdClient($client->getId());
fileStart("Client détails");
navBar("Clients");
?>
<h1 class="font font-bold text-gre-900 text-4xl py-3 flex justify-center">Détail du client 🔍</h1>
<div class="flex flex-col justify-center items-center">
    <div class="relative flex w-full max-w-[20rem] flex-col rounded-xl bg-white bg-clip-border p-8 shadow-md shadow-gray-500/40">
        <div class="relative m-0 mb-4 overflow-hidden rounded-none border-b border-white/10 bg-transparent bg-clip-border pb-8 text-center text-gray-700 shadow-none">
            <p class="block font-sans text-sm font-normal uppercase leading-normal antialiased">
                Id : <?= $client->getId() ?>
            </p>
            <h1 class="mt-6 flex justify-center gap-1 font-sans text-5xl font-normal tracking-normal antialiased">
                <?= $client->getNom() ?>
                <?= $client->getPrenom() ?>
            </h1>
        </div>
        <div class="p-0">
            <ul class="flex flex-col gap-4">
                <li class="flex items-center gap-4">
        <span class="rounded-full border border-white/20 bg-white/20 p-1">
          <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="2"
                  stroke="currentColor"
                  aria-hidden="true"
                  class="h-3 w-3"
          >
            <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M4.5 12.75l6 6 9-13.5"
            ></path>
          </svg>
        </span>
                    <p class="block font-sans text-base font-normal leading-relaxed text-inherit antialiased">
                        Adresse : <?= $client->getAdresse() ?>
                    </p>
                </li>
                <li class="flex items-center gap-4">
        <span class="rounded-full border border-white/20 bg-white/20 p-1">
          <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="2"
                  stroke="currentColor"
                  aria-hidden="true"
                  class="h-3 w-3"
          >
            <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M4.5 12.75l6 6 9-13.5"
            ></path>
          </svg>
        </span>
                    <p class="block font-sans text-base font-normal leading-relaxed text-inherit antialiased">
                        Type client : <?= $client
                            ->getType_client()
                            ->getLibelle() ?>
                    </p>
                </li>
            </ul>
        </div>
        <div class="mt-12 p-0 flex">
            <button
                    class="block w-1/2 select-none rounded-lg bg-[#f4a261] text-white py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase shadow-md shadow-blue-gray-500/10 transition-all hover:scale-[1.02] hover:shadow-lg hover:shadow-blue-gray-500/20 focus:scale-[1.02] focus:opacity-[0.85] focus:shadow-none active:scale-100 active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    type="button"
                    data-ripple-dark="true"
                    onclick="location.href='../Edit/clients.php?idClient=<?= $client->getId() ?>'"
            >
                Modifier
            </button>
            <button
                    class="block w-1/2 select-none rounded-lg bg-[#EF476F] text-white py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase shadow-md shadow-blue-gray-500/10 transition-all hover:scale-[1.02] hover:shadow-lg hover:shadow-blue-gray-500/20 focus:scale-[1.02] focus:opacity-[0.85] focus:shadow-none active:scale-100 active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    type="button"
                    data-ripple-dark="true"
                    onclick="location.href='../Delete/waiting_client.php?idClient=<?= $client->getId() ?>'"
            >
                Supprimer
            </button>
        </div>
    </div>

        <?php if (sizeof($locationClient) > 0) {
            echo '<h2 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Location(s)</h2>
    <div class="flex flex-row align-middle justify-center w-full self-center">';
            foreach ($locationClient as $location) {
                locationDetails($location, "car");
            }
            echo '
    </div>';
        } ?>

</div>



<?php fileEnd(); ?>

