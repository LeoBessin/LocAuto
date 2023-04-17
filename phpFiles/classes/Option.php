<?php
class Option {
    // Atributs
    private ?int $id;
    private ?string $libelle;
    private ?float $prix;

    // Methods
    public function __construct($id,$libelle,$prix) {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->prix = $prix;
    }
    public function getId(): int{
        return $this->id;
    }
    public function getLibelle(): string{
        return $this->libelle;
    }
    public function getPrix(): float{
        return $this->prix;
    }

}