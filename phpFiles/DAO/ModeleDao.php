<?php
require_once "classes/Modele.php";
require_once "MarqueDao.php";
require_once "CategorieDao.php";
require_once "outils/biblio.php";

class ModeleDao {

    private static ModeleDao $instance;
    private $connexion;

    private function __construct(){
        $this->connexion = connexionDatabase();
    }

    public static function getInstance(): ModeleDao {
        if(!isset(self::$instance)) {
            self::$instance = new ModeleDao();
        }
        return self::$instance;
    }

    public function dictToObj($dict):Modele{
        $DaoMarque = MarqueDao::getInstance();
        $DaoCategorie = CategorieDao::getInstance();
        $marque = $DaoMarque->getObjById($dict['id_marque']);
        $categorie = $DaoCategorie->getObjById($dict['id_categorie']);
        return new Modele($dict['id_modele'],$dict['libelle'],$dict['image'],$marque,$categorie);
    }
    public function getObjById($id): ?Modele {
        $request = "SELECT * FROM Modele WHERE id_modele=$id";
        $request_result = mysqli_query($this->connexion, $request);
        $ligne = mysqli_fetch_object($request_result);
        if($ligne!=null){
            $dict = [
                'id_modele' => $ligne->id_modele,
                'libelle' => $ligne->libelle,
                'image' => $ligne->image,
                'id_marque' => $ligne->id_marque,
                'id_categorie' => $ligne->id_categorie
            ];
            return $this->dictToObj($dict);
        } else {
            return null;
        }

    }
    public function getAllObj():array{
        $allObj = array();
        $request = "SELECT * FROM Modele";
        $request_result = mysqli_query($this->connexion, $request);
        while ($ligne = mysqli_fetch_object($request_result)){
            $dict = [
                'id_modele' => $ligne->id_modele,
                'libelle' => $ligne->libelle,
                'image' => $ligne->image,
                'id_marque' => $ligne->id_marque,
                'id_categorie' => $ligne->id_categorie
            ];
            $allObj[] = $this->dictToObj($dict);
        }
        return $allObj;

    }

}
?>