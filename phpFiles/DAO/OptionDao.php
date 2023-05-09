<?php
require_once "../../phpFiles/classes/OptionClass.php";
require_once "../../phpFiles/tools/biblio.php";

class OptionDao {

    private static OptionDao $instance;
    private $connexion;

    private function __construct(){
        $this->connexion = connexionDatabase();
    }

    public static function getInstance(): OptionDao {
        if(!isset(self::$instance)) {
            self::$instance = new OptionDao();
        }
        return self::$instance;
    }

    public function dictToObj($data):OptionClass{
        return new OptionClass($data->id_option,$data->libelle,$data->prix);
    }

    public function getObjById($id): ?OptionClass {
        $request = "SELECT * FROM Option WHERE id_option=$id";
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
        $request = "SELECT * FROM Option";
        $request_result = mysqli_query($this->connexion, $request);
        while ($data = mysqli_fetch_object($request_result)){
            $allObj[] = $this->dictToObj($data);
        }
        return $allObj;

    }

    public function getAllColumnsNames():array{
        $allNames = array();
        $request = "SELECT Column_name FROM Information_schema.columns WHERE Table_name LIKE 'Option'";
        $request_result = mysqli_query($this->connexion, $request);
        while ($ligne_name = mysqli_fetch_object($request_result)){
            $allNames[] = $ligne_name->Column_name;
        }
        return $allNames;
    }

}
?>