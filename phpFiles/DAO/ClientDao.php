<?php
require_once "../../phpFiles/classes/ClientClass.php";
require_once "../../phpFiles/DAO/Type_clientDao.php";
require_once "../../phpFiles/tools/biblio.php";

class ClientDao {

    private static ClientDao $instance;
    private $connexion;

    private function __construct(){
        $this->connexion = connexionDatabase();
    }

    public static function getInstance(): ClientDao {
        if(!isset(self::$instance)) {
            self::$instance = new ClientDao();
        }
        return self::$instance;
    }
    public function dictToObj($data):ClientClass{
        $DaoType_client = Type_clientDao::getInstance();
        $type_client = $DaoType_client->getObjById($data->id_type_client);
        return new ClientClass($data->id_client,$data->nom,$data->prenom,$data->adresse,$type_client);
    }
    public function getObjById($id): ?ClientClass {
        $request = "SELECT * FROM Client WHERE id_client=$id";
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
        $request = "SELECT * FROM Client";
        $request_result = mysqli_query($this->connexion, $request);
        while ($data = mysqli_fetch_object($request_result)){
            $allObj[] = $this->dictToObj($data);
        }
        return $allObj;

    }

    public function getAllColumnsNames():array{
        $allNames = array();
        $request = "SELECT Column_name FROM Information_schema.columns WHERE Table_name LIKE 'Client'";
        $request_result = mysqli_query($this->connexion, $request);
        while ($ligne_name = mysqli_fetch_object($request_result)){
            $allNames[] = $ligne_name->Column_name;
        }
        return $allNames;
    }
}
?>