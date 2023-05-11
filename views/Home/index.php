<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../../Assets/cssFiles/tailwind.css" rel="stylesheet">
</head>
<body class="flex justify-center flex-col items-center align-middle">
<?php
include "../../phpFiles/widgets/html-part.php";
navBar();
?>
<p class="font-bold text-2xl mb-8">Bienvenue sur le projet LocAuto</p>
<a class="p-4 rounded-full bg-gray-5 text-xl font-bold" href="../Locauto/option.php">Options</a>
<a class="p-4 rounded-full bg-gray-5 text-xl font-bold" href="../Locauto/categorie.php">Categories</a>
<a class="p-4 rounded-full bg-gray-5 text-xl font-bold" href="../Locauto/marque.php">Marques</a>
<a class="p-4 rounded-full bg-gray-5 text-xl font-bold" href="../Locauto/modele.php">Modeles</a>
<a class="p-4 rounded-full bg-gray-5 text-xl font-bold" href="../Locauto/type_client.php">Type clients</a>
<a class="p-4 rounded-full bg-gray-5 text-xl font-bold" href="../Locauto/client.php">Clients</a>
<a class="p-4 rounded-full bg-gray-5 text-xl font-bold" href="../Locauto/voiture.php">Voitures</a>
<a class="p-4 rounded-full bg-gray-5 text-xl font-bold" href="../Locauto/location.php">Locations</a>
</body>

<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
</html>