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
    public function dictToObj($dict):VoitureClass{
        $DaoModele = ModeleDao::getInstance();
        $modele = $DaoModele->getObjById($dict['id_modele']);
        return new VoitureClass($dict['immatriculation'],$dict['compteur'],$modele);
    }
    public function getObjById($id): ?VoitureClass {
        $request = "SELECT * FROM VoitureClass WHERE immatriculation='$id'";
        $request_result = mysqli_query($this->connexion, $request);
        $ligne = mysqli_fetch_object($request_result);
        if($ligne!=null){
            $dict = [
                'immatriculation' => $ligne->immatriculation,
                'compteur' => $ligne->compteur,
                'id_modele' => $ligne->id_modele
            ];
            return $this->dictToObj($dict);
        } else {
            return null;
        }

    }
    public function getAllObj():array{
        $allObj = array();
        $request = "SELECT * FROM VoitureClass";
        $request_result = mysqli_query($this->connexion, $request);
        while ($ligne = mysqli_fetch_object($request_result)){
            $dict = [
                'immatriculation' => $ligne->immatriculation,
                'compteur' => $ligne->compteur,
                'id_modele' => $ligne->id_modele
            ];
            $allObj[] = $this->dictToObj($dict);
        }
        return $allObj;

    }

}
?>