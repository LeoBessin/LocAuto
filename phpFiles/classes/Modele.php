<?php
require_once "classes/Marque.php";
require_once "classes/Categorie.php";
const PATH_IMG = "../Assets/images/car-pictures/";
class Modele {
    // Atributs
    private ?int $id;
    private ?string $libelle;
    private ?string $image;
    private ?Marque $marque;
    private ?Categorie $categorie;

    // Methods
    public function __construct($id,$libelle,$image,$marque,$categorie) {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->image = $image;
        $this->marque = $marque;
        $this->categorie = $categorie;
    }
    public function getId(): int{
        return $this->id;
    }
    public function getLibelle(): string{
        return $this->libelle;
    }
    public function getImage(): string{
        return PATH_IMG.$this->image;
    }
    public function getMarque(): Marque{
        return $this->marque;
    }
    public function getCategorie(): Categorie{
        return $this->categorie;
    }

}