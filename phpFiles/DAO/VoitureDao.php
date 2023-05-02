<?php
require_once "classes/VoitureClass.php";
require_once "DAO/ModeleDao.php";
require_once "tools/biblio.php";

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

}
?>