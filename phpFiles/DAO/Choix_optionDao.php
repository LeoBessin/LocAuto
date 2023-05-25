<?php
require_once "../../phpFiles/classes/Choix_optionClass.php";
require_once "../../phpFiles/tools/biblio.php";

class Choix_optionDao {

    private static Choix_optionDao $instance;
    private $connexion;

    private function __construct(){
        $this->connexion = connexionDatabase();
    }

    public static function getInstance(): Choix_optionDao {
        if(!isset(self::$instance)) {
            self::$instance = new Choix_optionDao();
        }
        return self::$instance;
    }
    public function dictToObj($data):Choix_optionClass{
        $DaoChoix_option = Choix_optionDao::getInstance();
        return new Choix_optionClass($data->id_option,$data->id_location);
    }

    public function getObjByIdOption($id):array {
    $request = "SELECT * FROM Choix_options WHERE id_option=$id";
    $request_result = mysqli_query($this->connexion, $request);
    $data = mysqli_fetch_object($request_result);
    while ($data = mysqli_fetch_object($request_result)){
        $allObj[] = $this->dictToObj($data);
    }
    return $allObj;

}

public function getObjByIdLocation($id):array {
    $allObj = array();
    $request = "SELECT * FROM Choix_options WHERE id_location=$id";
    $request_result = mysqli_query($this->connexion, $request);
    while ($data = mysqli_fetch_object($request_result)){
        $allObj[] = $this->dictToObj($data);
    }
    return $allObj;

}

    public function getAllObj():array{
    $allObj = array();
    $request = "SELECT * FROM Choix_options";
    $request_result = mysqli_query($this->connexion, $request);
    while ($data = mysqli_fetch_object($request_result)){
        $allObj[] = $this->dictToObj($data);
    }
    return $allObj;

}

    public function getAllColumnsNames():array{
        $allNames = array();
        $request = "SELECT Column_name FROM Information_schema.columns WHERE Table_name LIKE 'Choix_options'";
        $request_result = mysqli_query($this->connexion, $request);
        while ($ligne_name = mysqli_fetch_object($request_result)){
            $allNames[] = $ligne_name->Column_name;
        }
        return $allNames;
    }

    public function insertObj($id_location,$options):void{
        foreach ($options as $id_option){
            $request = "INSERT INTO Choix_options (id_option, id_location) VALUES (?, ?)";
            $request_result = $this->connexion->prepare($request);
            $request_result->execute([$id_option,$id_location]);

        }
    }



    public function deleteFromIdLocation($id):void
    {
        $request = "DELETE FROM Choix_options WHERE id_location='$id'";
        $request_result = $this->connexion->prepare($request);
        $request_result->execute();
    }

}
?>