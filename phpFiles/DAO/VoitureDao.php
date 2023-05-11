<?php
require_once "../../phpFiles/classes/VoitureClass.php";
require_once "../../phpFiles/DAO/ModeleDao.php";
require_once "../../phpFiles/tools/biblio.php";

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
    public function dictToObj($data):VoitureClass{
        $DaoModele = ModeleDao::getInstance();
        $modele = $DaoModele->getObjById($data->id_modele);
        return new VoitureClass($data->immatriculation,$data->compteur,$modele);
    }
    public function getObjById($id): ?VoitureClass {
        $request = "SELECT * FROM Voiture WHERE immatriculation='$id'";
        $request_result = mysqli_query($this->connexion, $request);
        $data = mysqli_fetch_object($request_result);
        if($data!=null){
            return $this->dictToObj($data);
        } else {
            return null;
        }

    }
    public function getAllObj():array{
        $allObj = array();
        $request = "SELECT * FROM Voiture";
        $request_result = mysqli_query($this->connexion, $request);
        while ($data = mysqli_fetch_object($request_result)){
            $allObj[] = $this->dictToObj($data);
        }
        return $allObj;

    }

    public function getAllIdAvailable():array{
        $allObj = array();
        $request = "SELECT immatriculation FROM Voiture RIGHT JOIN Location ON Voiture.immatriculation=Location.id_voiture;";
        $request_result = mysqli_query($this->connexion, $request);
        while ($data = mysqli_fetch_object($request_result)){
            $allObj[] = $data->immatriculation;
        }
        return $allObj;

    }

    public function getAllId():array{
        $allObj = array();
        $request = "SELECT immatriculation FROM Voiture ;";
        $request_result = mysqli_query($this->connexion, $request);
        while ($data = mysqli_fetch_object($request_result)){
            $allObj[] = $data->immatriculation;
        }
        return $allObj;

    }

    public function getAllColumnsNames():array{
        $allNames = array();
        $request = "SELECT Column_name FROM Information_schema.columns WHERE Table_name LIKE 'Voiture'";
        $request_result = mysqli_query($this->connexion, $request);
        while ($ligne_name = mysqli_fetch_object($request_result)){
            $allNames[] = $ligne_name->Column_name;
        }
        return $allNames;
    }

}
?>