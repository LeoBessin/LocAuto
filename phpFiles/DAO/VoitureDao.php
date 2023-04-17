<?php
require_once "classes/Voiture.php";
require_once "outils/biblio.php";

class VoitureDao {

    private static VoitureDAO $instance;
    private $connexion;

    private function __construct(){
        $this->connexion = connexionDatabase();
    }

    public static function getInstance(): VoitureDao {
        if(!isset(self::$instance)) {
            self::$instance = new VoitureDao();
        }
        return self::$instance;
    }

    public function getAllCars(){
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
        $resultat_cars = mysqli_query($this->connexion, $requete_cars);
        echo "<table>";
        echo "<thead><tr><td>Immatriculation</td><td>Compteur</td><td>Modèle</td><td>Image</td><td>Marque</td><td>Catégorie</td><td>Prix</td><tr></thead>";
        echo "<tbody>";
        while ($ligne = mysqli_fetch_object($resultat_cars)) {
            echo "<tr>";
            echo "<td>$ligne->immatriculation</td>";
            echo "<td>$ligne->compteur</td>";
            echo "<td>$ligne->modele_libelle</td>";
            echo "<td><img src='$ligne->image'/></td>";
            echo "<td>$ligne->marque_libelle</td>";
            echo "<td>$ligne->categorie_libelle</td>";
            echo "<td>$ligne->prix</td>";
            echo "</tr>";
        }
        echo "</tbody>";

        echo "</table>";
    }
}