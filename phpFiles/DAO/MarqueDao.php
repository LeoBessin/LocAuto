<?php
require_once "classes/MarqueClass.php";
require_once "tools/biblio.php";

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
    public function dictToObj($data):MarqueClass{
        return new MarqueClass($data->id_marque,$data->libelle);
    }
    public function getObjById($id): ?MarqueClass {
        $request = "SELECT * FROM Marque WHERE id_marque=$id";
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
        $request = "SELECT * FROM Marque";
        $request_result = mysqli_query($this->connexion, $request);
        while ($data = mysqli_fetch_object($request_result)){
            $allObj[] = $this->dictToObj($data);
        }
        return $allObj;

    }

}
?>