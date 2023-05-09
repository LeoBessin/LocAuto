<?php
require_once "../../phpFiles/classes/MarqueClass.php";
require_once "../../phpFiles/classes/CategorieClass.php";
const PATH_IMG = "../../Assets/images/car-pictures/";
class ModeleClass {
    // Atributs
    private ?int $id;
    private ?string $libelle;
    private ?string $image;
    private ?MarqueClass $marque;
    private ?CategorieClass $categorie;

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
    public function getMarque(): MarqueClass{
        return $this->marque;
    }
    public function getCategorie(): CategorieClass{
        return $this->categorie;
    }

}