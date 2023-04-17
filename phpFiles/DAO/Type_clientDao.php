<?php
require_once "classes/Type_client.php";
require_once "outils/biblio.php";

class Type_clientDao {

    private static Type_clientDao $instance;
    private $connexion;

    private function __construct(){
        $this->connexion = connexionDatabase();
    }

    public static function getInstance(): Type_clientDao {
        if(!isset(self::$instance)) {
            self::$instance = new Type_clientDao();
        }
        return self::$instance;
    }


}
?>