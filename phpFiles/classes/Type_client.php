<?php
class Type_client {
    // Atributs
    private ?int $id;
    private ?string $libelle;

    // Methods
    public function __construct($id,$libelle) {
        $this->id = $id;
        $this->libelle = $libelle;
    }
    public function getId(): int{
        return $this->id;
    }
    public function getLibelle(): string{
        return $this->libelle;
    }

}
