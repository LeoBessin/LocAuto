<?php
require_once "classes/Voiture.php";
require_once "classes/Client.php";
class Location {
    // Atributs
    private ?int $id;
    private ?string $date_debut;
    private ?string $date_fin;
    private ?string $compteur_debut;
    private ?string $compteur_fin;
    private ?Voiture $voiture;
    private ?Client $client;

    // Methods
    public function __construct($id,$date_debut,$date_fin,$compteur_debut,$compteur_fin,$voiture,$client) {
        $this->id = $id;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->compteur_debut = $compteur_debut;
        $this->compteur_fin = $compteur_fin;
        $this->voiture = $voiture;
        $this->client = $client;
    }
    public function getId(): int{
        return $this->id;
    }
    public function getDate_debut(): string{
        return $this->date_debut;
    }
    public function getDate_fin(): string{
        return $this->date_fin;
    }
    public function getCompteur_debut(): string{
        return $this->compteur_debut;
    }
    public function getCompteur_fin(): string{
        return $this->compteur_fin;
    }
    public function getVoiture(): Voiture{
        return $this->voiture;
    }
    public function getClient(): Client{
        return $this->client;
    }

}