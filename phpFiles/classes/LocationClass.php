<?php
require_once "../../phpFiles/classes/VoitureClass.php";
require_once "../../phpFiles/classes/ClientClass.php";
class LocationClass {
    // Atributs
    private ?int $id;
    private ?string $date_debut;
    private ?string $date_fin;
    private ?string $compteur_debut;
    private ?string $compteur_fin;
    private ?VoitureClass $voiture;
    private ?ClientClass $client;
    private ?array $option;

    // Methods
    public function __construct($id,$date_debut,$date_fin,$compteur_debut,$compteur_fin,$voiture,$client,$option) {
        $this->id = $id;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->compteur_debut = $compteur_debut;
        $this->compteur_fin = $compteur_fin;
        $this->voiture = $voiture;
        $this->client = $client;
        $this->option = $option;
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
    public function getVoiture(): VoitureClass{
        return $this->voiture;
    }
    public function getClient(): ClientClass{
        return $this->client;
    }
    public function getOption(): array{
        return $this->option;
    }

}