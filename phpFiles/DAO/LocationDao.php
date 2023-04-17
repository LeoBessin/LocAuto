<?php
require_once "classes/Location.php";
require_once "outils/biblio.php";

class LocationDao {

    private static LocationDao $instance;
    private $connexion;

    private function __construct(){
        $this->connexion = connexionDatabase();
    }

    public static function getInstance(): LocationDao {
        if(!isset(self::$instance)) {
            self::$instance = new LocationDao();
        }
        return self::$instance;
    }


}
?>