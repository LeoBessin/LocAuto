<?php
function fileStart()
{
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../../Assets/cssFiles/tailwind.css" rel="stylesheet">
  <style>
  </style>
</head>
<body>';
}

function navBar()
{
    $absolute_path= __DIR__;
    echo '<nav class="bg-white fixed w-full z-20 top-0 left-0 border-b border-gray-200 z-50">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4" >
    <a href="../../views/LaunchPage/" class="flex items-center">
        <div>
        <img width="100rem" src="'.$absolute_path.'/../../Assets/images/logos/locauto_logo_b.svg">   
    </div>
    </a>
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
        <li>
          <a href="../../views/Home/" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0" aria-current="page">Acceuil</a>
        </li>
        <li>
            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">Tables<svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" width="1rem" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
            <!-- Dropdown menu -->
            <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                  <li>
                    <a href="../Locauto/categorie.php" class="block px-4 py-2 hover:bg-gray-100 ">Catégorie</a>
                  </li>
                  <li>
                    <a href="../Locauto/client.php" class="block px-4 py-2 hover:bg-gray-100">Client</a>
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
          <a href="../../views/Parc" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">Parc</a>
        </li>
        <li>
          <a href="../../views/Client" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">Clients</a>
        </li>
        <li>
          <a href="../../views/About" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">À propos</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
<div class="mt-16"/>';
}

function fileEnd()
{
    echo '</body>
    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
</html>';
}

function tableStart($arrayNames,$editButton=false)
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

function tableEnd() {
    echo '</tbody>
    </table>
</div>';
}