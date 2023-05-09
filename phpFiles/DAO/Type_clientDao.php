<?php
require_once "../../phpFiles/classes/Type_clientClass.php";
require_once "../../phpFiles/tools/biblio.php";

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
    public function dictToObj($data):Type_clientClass{
        return new Type_clientClass($data->id_type_client,$data->libelle);
    }

    public function getObjById($id): ?Type_clientClass {
        $request = "SELECT * FROM Type_client WHERE id_type_client=$id";
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
        $request = "SELECT * FROM Type_client";
        $request_result = mysqli_query($this->connexion, $request);
        while ($data = mysqli_fetch_object($request_result)){
            $allObj[] = $this->dictToObj($data);
        }
        return $allObj;

    }

    public function getAllColumnsNames():array{
        $allNames = array();
        $request = "SELECT Column_name FROM Information_schema.columns WHERE Table_name LIKE 'Type_client'";
        $request_result = mysqli_query($this->connexion, $request);
        while ($ligne_name = mysqli_fetch_object($request_result)){
            $allNames[] = $ligne_name->Column_name;
        }
        return $allNames;
    }

}
?>