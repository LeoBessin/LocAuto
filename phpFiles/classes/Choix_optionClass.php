<?php
class Choix_optionClass
{
    // Atributs
    private ?int $id_option;
    private ?int $id_location;

    // Methods
    public function __construct($id_option, $id_location)
    {
        $this->id_option = $id_option;
        $this->id_location = $id_location;
    }
    public function getIdOption(): int
    {
        return $this->id_option;
    }
    public function getIdLocation(): int
    {
        return $this->id_location;
    }
}
