<?php
require_once "../../phpFiles/classes/ModeleClass.php";
class VoitureClass {
    // Atributs
    private ?string $immatriculation;
    private ?int $compteur;
    private ?ModeleClass $modele;

    // Methods
    public function __construct($immatriculation,$compteur,$modele) {
        $this->immatriculation = $immatriculation;
        $this->compteur = $compteur;
        $this->modele = $modele;
    }
    public function getImmatriculation(): string{
        return $this->immatriculation;
    }
    public function getCompteur(): int{
        return $this->compteur;
    }
    public function getModele(): ModeleClass{
        return $this->modele;
    }

}