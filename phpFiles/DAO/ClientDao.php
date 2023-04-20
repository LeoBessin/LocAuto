<?php
require_once "classes/ClientClass.php";
require_once "DAO/Type_clientDao.php";
require_once "tools/biblio.php";

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
    public function dictToObj($dict):ClientClass{
        $DaoType_client = Type_clientDao::getInstance();
        $type_client = $DaoType_client->getObjById($dict['id_type_client']);
        return new ClientClass($dict['id_client'],$dict['nom'],$dict['prenom'],$dict['adresse'],$type_client);
    }
    public function getObjById($id): ?ClientClass {
        $request = "SELECT * FROM ClientClass WHERE id_client=$id";
        $request_result = mysqli_query($this->connexion, $request);
        $ligne = mysqli_fetch_object($request_result);
        if($ligne!=null){
            $dict = [
                'id_client' => $ligne->id_client,
                'nom' => $ligne->nom,
                'prenom' => $ligne->prenom,
                'adresse' => $ligne->adresse,
                'id_type_client' => $ligne->id_type_client
            ];
            return $this->dictToObj($dict);
        } else {
            return null;
        }

    }
    public function getAllObj():array{
        $allObj = array();
        $request = "SELECT * FROM ClientClass";
        $request_result = mysqli_query($this->connexion, $request);
        while ($ligne = mysqli_fetch_object($request_result)){
            $dict = [
                'id_client' => $ligne->id_client,
                'nom' => $ligne->nom,
                'prenom' => $ligne->prenom,
                'adresse' => $ligne->adresse,
                'id_type_client' => $ligne->id_type_client
            ];
            $allObj[] = $this->dictToObj($dict);
        }
        return $allObj;

    }

}
?>