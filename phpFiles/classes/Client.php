<?php
require_once "Type_client.php";
class Client {
    // Atributs
    private ?int $id;
    private ?string $nom;
    private ?string $prenom;
    private ?string $adresse;
    private ?Type_client $type_client;

    // Methods
    public function __construct($id,$nom,$prenom,$adresse,$type_client) {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->type_client = $type_client;
    }
    public function getId(): int{
        return $this->id;
    }
    public function getPrenom(): string{
        return $this->prenom;
    }
    public function getNom(): string{
        return $this->nom;
    }
    public function getAdresse(): string{
        return $this->adresse;
    }
    public function getType_client(): Type_client{
        return $this->type_client;
    }

}
