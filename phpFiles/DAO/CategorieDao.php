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

    public function dictToObj($data):CategorieClass{
        return new CategorieClass($data->id_categorie,$data->libelle,$data->prix);
    }

    public function getObjById($id): ?CategorieClass {
        $request = "SELECT * FROM Categorie WHERE id_categorie='$id'";
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
        $request = "SELECT * FROM Categorie";
        $request_result = mysqli_query($this->connexion, $request);
        while ($data = mysqli_fetch_object($request_result)){
            $allObj[] = $this->dictToObj($data);
        }
        return $allObj;

    }

}
?>