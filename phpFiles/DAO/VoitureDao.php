<?php
require_once "classes/Voiture.php";
require_once "outils/biblio.php";

class VoitureDao {

    private static VoitureDAO $instance;
    private $connexion;

    private function __construct(){
        $this->connexion = connexionDatabase();
    }

    public static function getInstance(): VoitureDao {
        if(!isset(self::$instance)) {
            self::$instance = new VoitureDao();
        }
        return self::$instance;
    }

}
?>