<?php
require_once "classes/CategorieClass.php";
require_once "tools/biblio.php";

class CategorieDao {

    private static CategorieDao $instance;
    private $connexion;

    private function __construct(){
        $this->connexion = connexionDatabase();
    }

    public static function getInstance(): CategorieDao {
        if(!isset(self::$instance)) {
            self::$instance = new CategorieDao();
        }
        return self::$instance;
    }

    public function dictToObj($dict):CategorieClass{
        return new CategorieClass($dict['id_categorie'],$dict['libelle'],$dict['prix']);
    }

    public function getObjById($id): ?CategorieClass {
        $request = "SELECT * FROM CategorieClass WHERE id_categorie='$id'";
        $request_result = mysqli_query($this->connexion, $request);
        $ligne = mysqli_fetch_object($request_result);
        if($ligne!=null){
            $dict = [
                'id_categorie' => $ligne->id_categorie,
                'libelle' => $ligne->libelle,
                'prix' => $ligne->prix
            ];
            return $this->dictToObj($dict);
        } else {
            return null;
        }

    }

    public function getAllObj():array{
        $allObj = array();
        $request = "SELECT * FROM CategorieClass";
        $request_result = mysqli_query($this->connexion, $request);
        while ($ligne = mysqli_fetch_object($request_result)){
            $dict = [
                'id_categorie' => $ligne->id_categorie,
                'libelle' => $ligne->libelle,
                'prix' => $ligne->prix
            ];
            $allObj[] = $this->dictToObj($dict);
        }
        return $allObj;

    }

}
?>