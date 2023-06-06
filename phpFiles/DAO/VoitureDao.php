<?php
require_once "../../phpFiles/classes/VoitureClass.php";
require_once "../../phpFiles/DAO/LocationDao.php";
require_once "../../phpFiles/DAO/ModeleDao.php";
require_once "../../phpFiles/tools/biblio.php";

class VoitureDao
{
    private static VoitureDAO $instance;
    private mysqli $connexion;

    private function __construct()
    {
        $this->connexion = connexionDatabase();
    }

    public static function getInstance(): VoitureDao
    {
        if (!isset(self::$instance)) {
            self::$instance = new VoitureDao();
        }
        return self::$instance;
    }
    public function dictToObj($data): VoitureClass
    {
        $DaoModele = ModeleDao::getInstance();
        $modele = $DaoModele->getObjById($data->id_modele);
        return new VoitureClass(
            $data->immatriculation,
            $data->compteur,
            $modele
        );
    }
    public function getObjById($id): ?VoitureClass
    {
        $request = "SELECT * FROM Voiture WHERE immatriculation='$id'";
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
        $request = "SELECT * FROM Voiture";
        $request_result = mysqli_query($this->connexion, $request);
        while ($data = mysqli_fetch_object($request_result)) {
            $allObj[] = $this->dictToObj($data);
        }
        return $allObj;
    }

    public function getAllIdUnavailable(): array
    {
        $allObj = array();
        $request =
            "SELECT immatriculation,date_fin,date_debut FROM Voiture RIGHT JOIN Location ON Voiture.immatriculation=Location.id_voiture;";
        $request_result = mysqli_query($this->connexion, $request);
        while ($data = mysqli_fetch_object($request_result)) {
            $dateToday = date("Y-m-d");
            $dateEndLoc = $data->date_fin;
            $dateStartLoc = $data->date_debut;
            if ($dateEndLoc > $dateToday && $dateStartLoc < $dateToday) {
                $allObj[] = $data->immatriculation;
            }
        }
        return $allObj;
    }

    public function getAllObjAvailable(): array
    {
        $allObj = array();
        $request =
            "SELECT * FROM Voiture LEFT JOIN Location ON Voiture.immatriculation=Location.id_voiture WHERE id_location is NULL";
        $request_result = mysqli_query($this->connexion, $request);
        while ($data = mysqli_fetch_object($request_result)) {
            $allObj[] = $this->dictToObj($data);
        }
        return $allObj;
    }

    public function getAllId(): array
    {
        $allObj = array();
        $request = "SELECT immatriculation FROM Voiture ;";
        $request_result = mysqli_query($this->connexion, $request);
        while ($data = mysqli_fetch_object($request_result)) {
            $allObj[] = $data->immatriculation;
        }
        return $allObj;
    }

    public function getAllColumnsNames(): array
    {
        $allNames = array();
        $request =
            "SELECT Column_name FROM Information_schema.columns WHERE Table_name LIKE 'Voiture'";
        $request_result = mysqli_query($this->connexion, $request);
        while ($ligne_name = mysqli_fetch_object($request_result)) {
            $allNames[] = $ligne_name->Column_name;
        }
        return $allNames;
    }

    public function editObj($immatriculation, $compteur): void
    {
        if ($compteur != null) {
            $request = "UPDATE Voiture SET compteur='$compteur' WHERE immatriculation='$immatriculation'";
            $request_result = $this->connexion->prepare($request);
            $request_result->execute();
        }
    }

    public function insertObj($immatriculation, $compteur, $idModele): void
    {
        $request =
            "INSERT INTO Voiture (immatriculation, compteur, id_modele) VALUES (?, ?, ?)";
        $request_result = $this->connexion->prepare($request);
        $request_result->execute([$immatriculation, $compteur, $idModele]);
    }

    public function deleteFromImmatriculation($idVoiture): void
    {
        $DaoLocation = LocationDao::getInstance();
        $allImmatriculationOfLocation = $DaoLocation->getAllImmatriculation();
        if (in_array($idVoiture, $allImmatriculationOfLocation)) {
            $allLocation = $DaoLocation->getAllObjByImmatriculation($idVoiture);
            foreach ($allLocation as $location) {
                $DaoLocation->deleteFromId($location->getId());
            }
        }
        $request = "DELETE FROM Voiture WHERE immatriculation='$idVoiture'";
        $request_result = $this->connexion->prepare($request);
        $request_result->execute();
    }
}
?>
