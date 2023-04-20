<?php
require_once "classes/OptionClass.php";
require_once "tools/biblio.php";

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

    public function dictToObj($dict):OptionClass{
        return new OptionClass($dict['id_option'],$dict['libelle'],$dict['prix']);
    }

    public function getObjById($id): ?OptionClass {
        $request = "SELECT * FROM OptionClass WHERE id_option=$id";
        $request_result = mysqli_query($this->connexion, $request);
        $ligne = mysqli_fetch_object($request_result);
        if($ligne!=null){
            $dict = [
                'id_option' => $ligne->id_option,
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
        $request = "SELECT * FROM OptionClass";
        $request_result = mysqli_query($this->connexion, $request);
        while ($ligne = mysqli_fetch_object($request_result)){
            $dict = [
                'id_option' => $ligne->id_option,
                'libelle' => $ligne->libelle,
                'prix' => $ligne->prix
            ];
            $allObj[] = $this->dictToObj($dict);
        }
        return $allObj;

    }

}
?>