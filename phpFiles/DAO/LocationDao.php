<?php
require_once "classes/LocationClass.php";
require_once "DAO/VoitureDao.php";
require_once "DAO/ClientDao.php";
require_once "DAO/OptionDao.php";
require_once "tools/biblio.php";

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
    public function dictToObj($dict):LocationClass{
        $DaoVoiture = VoitureDao::getInstance();
        $DaoClient = ClientDao::getInstance();
        $DaoOption = OptionDao::getInstance();
        $request_opt = "SELECT * FROM Choix_options WHERE id_location=".$dict['id_location'];
        $request_result_opt = mysqli_query($this->connexion, $request_opt);
        $option = array();
        while ($ligne_opt = mysqli_fetch_object($request_result_opt)){
            $option[] = $DaoOption->getObjById($ligne_opt->id_option);
        }
        $voiture = $DaoVoiture->getObjById($dict['id_voiture']);
        $client = $DaoClient->getObjById($dict['id_client']);

        return new LocationClass($dict['id_location'],$dict['date_debut'],$dict['date_fin'],$dict['compteur_debut'],$dict['compteur_fin'],$voiture,$client,$option);
    }
    public function getObjById($id): ?LocationClass {
        $request = "SELECT * FROM LocationClass WHERE id_location=$id";
        $request_result = mysqli_query($this->connexion, $request);
        $ligne = mysqli_fetch_object($request_result);
        if($ligne!=null){
            $dict = [
                'id_location' => $ligne->id_location,
                'date_debut' => $ligne->date_debut,
                'date_fin' => $ligne->date_fin,
                'compteur_debut' => $ligne->compteur_debut,
                'compteur_fin' => $ligne->compteur_fin,
                'id_voiture' => $ligne->id_voiture,
                'id_client' => $ligne->id_client
            ];
            return $this->dictToObj($dict);
        } else {
            return null;
        }

    }
    public function getAllObj():array{
        $allObj = array();
        $request = "SELECT * FROM LocationClass";
        $request_result = mysqli_query($this->connexion, $request);
        while ($ligne = mysqli_fetch_object($request_result)){
            $dict = [
                'id_location' => $ligne->id_location,
                'date_debut' => $ligne->date_debut,
                'date_fin' => $ligne->date_fin,
                'compteur_debut' => $ligne->compteur_debut,
                'compteur_fin' => $ligne->compteur_fin,
                'id_voiture' => $ligne->id_voiture,
                'id_client' => $ligne->id_client
            ];
            $allObj[] = $this->dictToObj($dict);
        }
        return $allObj;

    }


}
?>