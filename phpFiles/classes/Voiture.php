<?php
require_once "Modele.php";
class Voiture {
    // Atributs
    private ?string $immatriculation;
    private ?int $compteur;
    private ?Modele $modele;

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
    public function getModele(): Modele{
        return $this->modele;
    }

}