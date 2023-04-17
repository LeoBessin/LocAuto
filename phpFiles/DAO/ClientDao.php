<?php
require_once "classes/Client.php";
require_once "outils/biblio.php";

class ClientDao {

    private static ClientDao $instance;
    private $connexion;

    private function __construct(){
        $this->connexion = connexionDatabase();
    }

    public static function getInstance(): ClientDao {
        if(!isset(self::$instance)) {
            self::$instance = new ClientDao();
        }
        return self::$instance;
    }


}
?>