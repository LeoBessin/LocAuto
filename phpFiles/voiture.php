<?php
    include "outils/biblio.php";
$connexion = connexion();
$requete_cars = "
SELECT immatriculation,
       compteur,
       Modele.libelle AS modele_libelle,
       image,
       Marque.libelle AS marque_libelle,
       Categorie.libelle AS categorie_libelle,
       prix
FROM Voiture
    JOIN Modele using(id_modele)
    LEFT JOIN Marque using(id_marque)
    LEFT JOIN Categorie using(id_categorie)
";
$resultat_cars = mysqli_query($connexion, $requete_cars);

$img_path = "../Assets/images/car-pictures/";

echo "<table>";
echo "<thead><tr><td>Immatriculation</td><td>Compteur</td><td>Modèle</td><td>Image</td><td>Marque</td><td>Catégorie</td><td>Prix</td><tr></thead>";
echo "<tbody>";
while ($ligne = mysqli_fetch_object($resultat_cars)) {
    echo "<tr>";
    echo "<td>$ligne->immatriculation</td>";
    echo "<td>$ligne->compteur</td>";
    echo "<td>$ligne->modele_libelle</td>";
    echo "<td><img src='$img_path$ligne->image'/></td>";
    echo "<td>$ligne->marque_libelle</td>";
    echo "<td>$ligne->categorie_libelle</td>";
    echo "<td>$ligne->prix</td>";
    echo "</tr>";
}
echo "</tbody>";

echo "</table>";