<?php
require_once "classes/Type_clientClass.php";
require_once "tools/biblio.php";

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
    public function dictToObj($dict):Type_clientClass{
        return new Type_clientClass($dict['id_type_client'],$dict['libelle']);
    }

    public function getObjById($id): ?Type_clientClass {
        $request = "SELECT * FROM Type_clientClass WHERE id_type_client=$id";
        $request_result = mysqli_query($this->connexion, $request);
        $ligne = mysqli_fetch_object($request_result);
        if($ligne!=null){
            $dict = [
                'id_type_client' => $ligne->id_type_client,
                'libelle' => $ligne->libelle
            ];
            return $this->dictToObj($dict);
        } else {
            return null;
        }

    }
    public function getAllObj():array{
        $allObj = array();
        $request = "SELECT * FROM Type_clientClass";
        $request_result = mysqli_query($this->connexion, $request);
        while ($ligne = mysqli_fetch_object($request_result)){
            $dict = [
                'id_type_client' => $ligne->id_type_client,
                'libelle' => $ligne->libelle
            ];
            $allObj[] = $this->dictToObj($dict);
        }
        return $allObj;

    }


}
?>