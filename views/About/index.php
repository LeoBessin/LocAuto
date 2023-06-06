<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>À propos</title>
    <link href="../../Assets/cssFiles/tailwind.css" rel="stylesheet">
</head>
<body class="flex justify-center flex-col items-center align-middle">
<?php
include "../../phpFiles/DAO/LocationDao.php";
include "../../phpFiles/widgets/html-part.php";
$DaoLocation = LocationDao::getInstance();
$DaoClient = ClientDao::getInstance();
$DaoVoiture = VoitureDao::getInstance();
$allLocation = $DaoLocation->getAllObj();
$allClient = $DaoClient->getAllObj();
$allVoiture = $DaoVoiture->getAllObj();
navBar("Propos");
?>

<div class="w-full bg-white border border-gray-200 rounded-lg shadow">
    <div class="sm:hidden">
        <label for="tabs" class="sr-only">Select tab</label>
        <select id="tabs" class="bg-gray-50 border-0 border-b border-gray-200 text-gray-900 text-sm rounded-t-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <option>Statistiques</option>
            <option>Services</option>
            <option>FAQ</option>
        </select>
    </div>
    <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex " id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
        <li class="w-full">
            <button id="stats-tab" data-tabs-target="#stats" type="button" role="tab" aria-controls="stats" aria-selected="true" class="inline-block w-full p-4 rounded-tl-lg bg-gray-50 hover:bg-gray-100 focus:outline-none">Statistiques</button>
        </li>
        <li class="w-full">
            <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="false" class="inline-block w-full p-4 bg-gray-50 hover:bg-gray-100 focus:outline-none">Services</button>
        </li>
        <li class="w-full">
            <button id="faq-tab" data-tabs-target="#faq" type="button" role="tab" aria-controls="faq" aria-selected="false" class="inline-block w-full p-4 rounded-tr-lg bg-gray-50 hover:bg-gray-100 focus:outline-none">FAQ</button>
        </li>
    </ul>
    <div id="fullWidthTabContent" class="border-t border-gray-200 ">
        <div class="hidden p-4 bg-white rounded-lg md:p-8 " id="stats" role="tabpanel" aria-labelledby="stats-tab">
            <dl class="grid max-w-screen-xl grid-cols-2 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-5 sm:p-8">
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl font-extrabold"><?= sizeof(
                        $allLocation
                    ) ?></dt>
                    <dd class="text-gray-500 ">Locations</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl font-extrabold"><?= sizeof(
                        $allClient
                    ) ?></dt>
                    <dd class="text-gray-500 ">Clients</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl font-extrabold"><?= sizeof(
                        $allVoiture
                    ) ?></dt>
                    <dd class="text-gray-500 ">Voitures</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl font-extrabold">20/20</dt>
                    <dd class="text-gray-500 ">Bernard Valton</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl font-extrabold">100%</dt>
                    <dd class="text-gray-500 ">Tailwind CSS</dd>
                </div>
            </dl>
        </div>
        <div class="hidden p-4 bg-white rounded-lg md:p-8 " id="about" role="tabpanel" aria-labelledby="about-tab">
            <h2 class="mb-5 text-2xl font-extrabold tracking-tight text-gray-900 ">Pourquoi choisir Locauto ?</h2>
            <!-- List -->
            <ul role="list" class="space-y-4 text-gray-500 ">
                <li class="flex space-x-2">
                    <!-- Icon -->
                    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    <span class="leading-tight">Tarifs bas, évaluations élevées</span>
                </li>
                <li class="flex space-x-2">
                    <!-- Icon -->
                    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    <span class="leading-tight">Présence dans toute la France</span>
                </li>
                <li class="flex space-x-2">
                    <!-- Icon -->
                    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    <span class="leading-tight">Location sans guichet possible</span>
                </li>
                <li class="flex space-x-2">
                    <!-- Icon -->
                    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    <span class="leading-tight">Partenariat avec Enterprise</span>
                </li>
            </ul>
        </div>
        <div class="hidden p-4 bg-white rounded-lg md:p-8 " id="faq" role="tabpanel" aria-labelledby="faq-tab">
            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white text-gray-900 " data-inactive-classes="text-gray-500 ">
                <h2 id="accordion-flush-heading-1">
                    <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 " data-accordion-target="#accordion-flush-body-1" aria-expanded="true" aria-controls="accordion-flush-body-1">
                        <span>Qu'est-ce que Locauto?</span>
                        <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </h2>
                <p class="tracking-wide text-gray-500 md:text-lg max-w-2xl"><a class="font-semibold text-gray-900 underline decoration-indigo-500">Locauto</a> est une entreprise 100% française spécialisée dans les services de mobilité, présente sur le marché français depuis 1979. Nous vous proposons des solutions de location de voitures adaptées à vos besoins, que ce soit pour un voyage d’affaires ou de loisirs. Nous disposons d’une flotte variée et moderne, composée de voitures de tourisme, de véhicules utilitaires et de minibus. Nous vous offrons des tarifs compétitifs, une réservation en ligne facile et rapide, et un service client efficace et professionnel. Avec Locauto, vous bénéficiez d’une expérience de location de voiture de qualité, reconnue par plus de 23 000 avis positifs sur Trustpilot. Que vous souhaitiez louer une voiture à Paris, Rennes, Nantes, Lyon ou Caen, vous trouverez toujours une agence Locauto à proximité. Locauto, c’est la garantie d’une location de voiture simple et sûre en France.
                    </p>
            </div>
        </div>
    </div>
</div>

</body>
<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
</html>