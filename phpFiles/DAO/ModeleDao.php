<?php
require_once "../../phpFiles/classes/ModeleClass.php";
require_once "../../phpFiles/DAO/MarqueDao.php";
require_once "../../phpFiles/DAO/CategorieDao.php";
require_once "../../phpFiles/tools/biblio.php";

class ModeleDao
{
    private static ModeleDao $instance;
    private $connexion;

    private function __construct()
    {
        $this->connexion = connexionDatabase();
    }

    public static function getInstance(): ModeleDao
    {
        if (!isset(self::$instance)) {
            self::$instance = new ModeleDao();
        }
        return self::$instance;
    }

    public function dictToObj($data): ModeleClass
    {
        $DaoMarque = MarqueDao::getInstance();
        $DaoCategorie = CategorieDao::getInstance();
        $marque = $DaoMarque->getObjById($data->id_marque);
        $categorie = $DaoCategorie->getObjById($data->id_categorie);
        return new ModeleClass(
            $data->id_modele,
            $data->libelle,
            $data->image,
            $marque,
            $categorie
        );
    }
    public function getObjById($id): ?ModeleClass
    {
        $request = "SELECT * FROM Modele WHERE id_modele=$id";
        $request_result = mysqli_query($this->connexion, $request);
        $data = mysqli_fetch_object($request_result);
        if ($data != null) {
            return $this->dictToObj($data);
        } else {
            return null;
        }
    }
    public function getAllObj(): array
    {
        $allObj = array();
        $request = "SELECT * FROM Modele";
        $request_result = mysqli_query($this->connexion, $request);
        while ($data = mysqli_fetch_object($request_result)) {
            $allObj[] = $this->dictToObj($data);
        }
        return $allObj;
    }

    public function getAllColumnsNames(): array
    {
        $allNames = array();
        $request =
            "SELECT Column_name FROM Information_schema.columns WHERE Table_name LIKE 'Modele'";
        $request_result = mysqli_query($this->connexion, $request);
        while ($ligne_name = mysqli_fetch_object($request_result)) {
            $allNames[] = $ligne_name->Column_name;
        }
        return $allNames;
    }
}
?>
