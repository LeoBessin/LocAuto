<?php
require_once "classes/Marque.php";
require_once "outils/biblio.php";

class MarqueDao {

    private static MarqueDao $instance;
    private $connexion;

    private function __construct(){
        $this->connexion = connexionDatabase();
    }

    public static function getInstance(): MarqueDao {
        if(!isset(self::$instance)) {
            self::$instance = new MarqueDao();
        }
        return self::$instance;
    }
    public function dictToObj($dict):Marque{
        return new Marque($dict['id_marque'],$dict['libelle']);
    }
    public function getObjById($id): ?Marque {
        $request = "SELECT * FROM Marque WHERE id_marque=$id";
        $request_result = mysqli_query($this->connexion, $request);
        $ligne = mysqli_fetch_object($request_result);
        if($ligne!=null){
            $dict = [
                'id_marque' => $ligne->id_marque,
                'libelle' => $ligne->libelle
            ];
            return $this->dictToObj($dict);
        } else {
            return null;
        }

    }
    public function getAllObj():array{
        $allObj = array();
        $request = "SELECT * FROM Marque";
        $request_result = mysqli_query($this->connexion, $request);
        while ($ligne = mysqli_fetch_object($request_result)){
            $dict = [
                'id_marque' => $ligne->id_marque,
                'libelle' => $ligne->libelle
            ];
            $allObj[] = $this->dictToObj($dict);
        }
        return $allObj;

    }

}
?>