<?php
function fileStart($pageTitle): void
{
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>' .
        $pageTitle .
        '</title>
    <link rel="icon" type="image/x-icon" href="../../Assets/icon/logo.ico">
    <link href="../../Assets/cssFiles/tailwind.css" rel="stylesheet">
  <style>
        #plaque-main {
            border: black;
            border-style: solid;
            border-width: 3px;
            border-radius: 10px;
            width: 260px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            overflow: hidden;
            font-family: Verdana;
            font-size: x-large;
        }

        #plaque-left, #plaque-right {
            background: #0077b6;
            content: "";
            height: 60px;
            width: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        #depNb,#nat {
            color: white;
            font-size: medium;
        }
        #dep {
            background: white;
            border-radius: 5px;
        }
        
        #dep,#eur {
        margin-top: 5px;
        }
  </style>
</head>
<body>';
}

function navBar($curPage): void
{
    $absolute_path = __DIR__;
    echo '<nav class="bg-white fixed w-full top-0 left-0 border-b border-gray-200 z-50">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2" >
    <a href="../../views/LaunchPage/" class="flex items-center">
        <div>
        <img width="100rem" src="' .
        $absolute_path .
        '/../../Assets/images/logos/locauto_logo_b.svg" alt="logo locauto">   
    </div>
    </a>
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
        <li>
          <a href="../../views/Home/" class="block py-2 pl-3 pr-4 bg-blue-700 rounded md:bg-transparent md:p-0 ' .
        ($curPage == "Acceuil" ? "md:text-blue-700" : "") .
        '" >Acceuil</a>
        </li>
        <li>
            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto ' .
        ($curPage == "Tables" ? "md:text-blue-700" : "") .
        '">Tables<svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" width="1rem" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
            <!-- Dropdown menu -->
            <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                  <li>
                    <a href="../Locauto/categorie.php" class="block px-4 py-2 hover:bg-gray-100 ">Catégorie</a>
                  </li>
                  <li>
                    <a href="../Locauto/choix_option.php" class="block px-4 py-2 hover:bg-gray-100 ">Choix option</a>
                  </li>
                  <li>
                    <a href="../Locauto/client.php" class="block px-4 py-2 hover:bg-gray-100 ">Client</a>
                  </li>
                  <li>
                    <a href="../Locauto/location.php" class="block px-4 py-2 hover:bg-gray-100">Location</a>
                  </li>
                  <li>
                    <a href="../Locauto/marque.php" class="block px-4 py-2 hover:bg-gray-100 ">Marque</a>
                  </li>
                  <li>
                    <a href="../Locauto/modele.php" class="block px-4 py-2 hover:bg-gray-100 ">Modèle</a>
                  </li>
                  <li>
                    <a href="../Locauto/option.php" class="block px-4 py-2 hover:bg-gray-100">Option</a>
                  </li>
                  <li>
                    <a href="../Locauto/type_client.php" class="block px-4 py-2 hover:bg-gray-100 ">Type client</a>
                  </li>
                  <li>
                    <a href="../Locauto/voiture.php" class="block px-4 py-2 hover:bg-gray-100 ">Voiture</a>
                  </li>
                </ul>
        </li>
        <li>
          <a href="../../views/Parc" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ' .
        ($curPage == "Parc" ? "md:text-blue-700" : "") .
        '">Parc</a>
        </li>
        <li>
          <a href="../../views/Client" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ' .
        ($curPage == "Clients" ? "md:text-blue-700" : "") .
        '">Clients</a>
        </li>
        <li>
          <a href="../../views/About" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ' .
        ($curPage == "Propos" ? "md:text-blue-700" : "") .
        '">À propos</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
<div class="mt-16"/>';
}

function fileEnd(): void
{
    echo '
</div>
</body>
    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
</html>';
}

function tableStart($arrayNames): void
{
    echo '
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>';
    foreach ($arrayNames as $name) {
        echo '<th scope="col" class="px-6 py-3">' . $name . "</th>";
    }
    echo '</tr>
        </thead>
        <tbody>';
}

function tableEnd(): void
{
    echo '</tbody>
    </table>
</div>';
}

function locationDetails($location, $detail, $showEdit = true): void
{
    echo '<div class="relative mt-6 flex w-96 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
    <div class="p-6">
        <svg xmlns="http://www.w3.org/2000/svg"
             class="mb-4 h-12 w-12 text-pink-500" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
            <g><path d="M675.3,79.9c0-38.6-31.3-69.9-69.9-69.9H394.6c-38.6,0-69.9,31.3-69.9,69.9v0.2c0,38.6,31.3,69.9,69.9,69.9h210.8c38.6,0,69.9-31.3,69.9-69.9V79.9z"/><path d="M817.5,79.4h-71.7v2c0,77.2-61.2,138-138.4,138H396.9c-77.2,0-141.6-60.8-141.6-138v-2h-68.4c-58.1,0-107.4,48.9-107.4,106.9v700.7c0,58.1,49.3,102.9,107.4,102.9h630.7c58.1,0,103.1-44.8,103.1-102.9V186.4C920.6,128.3,875.6,79.4,817.5,79.4z M677.4,850H327c-19.4,0-35-15.4-35-34.7s15.7-34.7,35-34.7h350.4c19.4,0,35,15.4,35,34.7S696.7,850,677.4,850z M607.3,640.6H327c-19.4,0-35-15.9-35-35.3c0-19.4,15.7-35.3,35-35.3h280.3c19.3,0,35,15.9,35,35.3C642.3,624.6,626.6,640.6,607.3,640.6z M677.4,430H327c-19.4,0-35-15.9-35-35.3s15.7-35.3,35-35.3h350.4c19.4,0,35,15.9,35,35.3S696.7,430,677.4,430z"/></g>
</svg>
        <h5 class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
            Location Nº' .
        $location->getId() .
        '
        </h5>
        <div>
            <h5 class="mb-2 block font-sans text-l font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                Information sur la location :
            </h5>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">

                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Compteur
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            Début
                        </th>
                        <td class="px-6 py-4">
                            ' .
        date_format(date_create($location->getDate_debut()), "F j, Y") .
        '
                        </td>
                        <td class="px-6 py-4">
                            ' .
        $location->getCompteur_debut() .
        'km
                        </td>
                    </tr>
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            Fin
                        </th>
                        <td class="px-6 py-4">
                            ' .
        date_format(date_create($location->getDate_fin()), "F j, Y") .
        '
                        </td>
                        <td class="px-6 py-4">
                            ' .
        $location->getCompteur_fin() .
        'km
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>';
    if ($detail == "car") {
        echo '
            <h5 class="mb-2 block font-sans text-l font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                Information sur la voiture :
            </h5>
            <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                Immatriculation : ' .
            $location->getVoiture()->getImmatriculation() .
            ' <br/>
                Marque : ' .
            $location
                ->getVoiture()
                ->getModele()
                ->getMarque()
                ->getLibelle() .
            ' <br/>
                Modèle : ' .
            $location
                ->getVoiture()
                ->getModele()
                ->getLibelle() .
            ' <br/>
            </p>';
    } else {
        echo '
            <h5 class="mb-2 block font-sans text-l font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                Information sur le client :
            </h5>
            <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                ' .
            $location->getClient()->getPrenom() .
            " " .
            $location->getClient()->getNom() .
            ' <br/>
                Type : ' .
            $location
                ->getClient()
                ->getType_client()
                ->getLibelle() .
            ' <br/>
            </p>';
    }
    echo '
            <h5 class="mb-2 block font-sans text-l font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                Option(s) :
            </h5>
            ';
    foreach ($location->getOption() as $option) {
        echo '<p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">';
        echo $option->getLibelle();
        echo "</p>";
    }
    echo '
        </div>
    </div>';
    if ($showEdit) {
        echo '
    <div class="p-6 pt-0 flex flex-row">
            <button
                class="block w-1/2 select-none rounded-lg bg-[#f4a261] text-white py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase shadow-md shadow-blue-gray-500/10 transition-all hover:scale-[1.02] hover:shadow-lg hover:shadow-blue-gray-500/20 focus:scale-[1.02] focus:opacity-[0.85] focus:shadow-none active:scale-100 active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="button"
                data-ripple-dark="true"
                onclick="location.href=' .
            "'../Edit/locations.php?idLocation=" .
            $location->getId() .
            "'" .
            '"
        >
            Modifier
        </button>
        <a
            class="!font-medium !text-blue-gray-900 !transition-colors hover:!text-pink-500"
            href="#"
        >
        </a>
    </div>';
    }

    echo '
</div>';
}

function opinionList($allLocation): void
{
    $json = file_get_contents("../../Assets/jsonFiles/opinion.json");
    $json_data = json_decode($json);
    $i = 0;
    foreach ($allLocation as $location) {
        $i++;
        $itJson = $i % sizeof($json_data);
        echo '
<div class="bg-white border border-gray-200 rounded-lg shadow" style="min-width: 25vw">
    <a href="#">
        <img class="p-8 rounded-t-lg" src="' .
            $location
                ->getVoiture()
                ->getModele()
                ->getImage() .
            '" alt="product image" />
    </a>
    <div class="px-5 pb-5">
        <a href="#">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900">' .
            $json_data[$itJson]->comment .
            '</h5>
        </a>
        <div class="flex items-center mt-2.5 mb-5">
        ';
        for ($j = 0; $j < $json_data[$itJson]->rating; $j++) {
            echo '            <svg aria-hidden="true" class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Fourth star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
';
        }
        echo ' <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded ml-3">' .
            $json_data[$itJson]->rating .
            '.0</span>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-3xl font-bold text-gray-900 ">' .
            $location->getClient()->getNom() .
            " " .
            $location->getClient()->getPrenom() .
            '</span>
            <a href="../../views/Details/client.php?id=' .
            $location->getClient()->getId() .
            '" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Détail du client</a>
 
        </div>
    </div>
</div>
';
    }
}
