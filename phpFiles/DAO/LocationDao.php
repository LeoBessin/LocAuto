<?php
require_once "../../phpFiles/classes/LocationClass.php";
require_once "../../phpFiles/DAO/VoitureDao.php";
require_once "../../phpFiles/DAO/ClientDao.php";
require_once "../../phpFiles/DAO/OptionDao.php";
require_once "../../phpFiles/DAO/Choix_optionDao.php";
require_once "../../phpFiles/tools/biblio.php";

class LocationDao
{
    private static LocationDao $instance;
    private $connexion;

    private function __construct()
    {
        $this->connexion = connexionDatabase();
    }

    public static function getInstance(): LocationDao
    {
        if (!isset(self::$instance)) {
            self::$instance = new LocationDao();
        }
        return self::$instance;
    }
    public function dictToObj($data): LocationClass
    {
        $DaoVoiture = VoitureDao::getInstance();
        $DaoClient = ClientDao::getInstance();
        $DaoOption = OptionDao::getInstance();
        $request_opt =
            "SELECT * FROM Choix_options WHERE id_location=" .
            $data->id_location;
        $request_result_opt = mysqli_query($this->connexion, $request_opt);
        $option = [];
        while ($ligne_opt = mysqli_fetch_object($request_result_opt)) {
            $option[] = $DaoOption->getObjById($ligne_opt->id_option);
        }
        $voiture = $DaoVoiture->getObjById($data->id_voiture);
        $client = $DaoClient->getObjById($data->id_client);

        return new LocationClass(
            $data->id_location,
            $data->date_debut,
            $data->date_fin,
            $data->compteur_debut,
            $data->compteur_fin,
            $voiture,
            $client,
            $option
        );
    }
    public function getObjById($id): ?LocationClass
    {
        $request = "SELECT * FROM Location WHERE id_location=$id";
        $request_result = mysqli_query($this->connexion, $request);
        $data = mysqli_fetch_object($request_result);
        if ($data != null) {
            return $this->dictToObj($data);
        } else {
            return null;
        }
    }

    public function getLastObj(): ?LocationClass
    {
        $request = "SELECT * FROM Location ORDER BY id_location DESC LIMIT 1";
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
        $request = "SELECT * FROM Location";
        $request_result = mysqli_query($this->connexion, $request);
        while ($data = mysqli_fetch_object($request_result)) {
            $allObj[] = $this->dictToObj($data);
        }
        return $allObj;
    }

    public function getAllObjByIdClient($clientId): array
    {
        $allObj = array();
        $request = "SELECT * FROM Location WHERE id_client=" . $clientId;
        $request_result = mysqli_query($this->connexion, $request);
        while ($data = mysqli_fetch_object($request_result)) {
            $allObj[] = $this->dictToObj($data);
        }
        return $allObj;
    }
    public function getAllObjByImmatriculation($immatriculation): array
    {
        $allObj = array();
        $request =
            'SELECT * FROM Location WHERE id_voiture="' .
            $immatriculation .
            '"';
        $request_result = mysqli_query($this->connexion, $request);
        while ($data = mysqli_fetch_object($request_result)) {
            $allObj[] = $this->dictToObj($data);
        }
        return $allObj;
    }

    public function getLastLocationByImmatriculation(
        $immatriculation
    ): ?LocationClass {
        $request = "SELECT * FROM `Location` WHERE id_voiture='$immatriculation' LIMIT 1";
        $request_result = mysqli_query($this->connexion, $request);
        $data = mysqli_fetch_object($request_result);
        if ($data != null) {
            return $this->dictToObj($data);
        } else {
            return null;
        }
    }

    public function getAllColumnsNames(): array
    {
        $allNames = array();
        $request =
            "SELECT Column_name FROM Information_schema.columns WHERE Table_name LIKE 'Location'";
        $request_result = mysqli_query($this->connexion, $request);
        while ($ligne_name = mysqli_fetch_object($request_result)) {
            $allNames[] = $ligne_name->Column_name;
        }
        return $allNames;
    }
    public function editObj($id_location, $date_fin, $compteur_fin): void
    {
        if ($date_fin != null) {
            $request = "UPDATE Location SET date_fin='$date_fin' WHERE id_location=$id_location";
            $request_result = $this->connexion->prepare($request);
            $request_result->execute();
        }
        if ($compteur_fin != null) {
            $request = "UPDATE Location SET compteur_fin='$compteur_fin' WHERE id_location=$id_location";
            $request_result = $this->connexion->prepare($request);
            $request_result->execute();
        }
    }

    public function insertObj(
        $id_location,
        $date_debut,
        $date_fin,
        $compteur_debut,
        $compteur_fin,
        $id_voiture,
        $id_client,
        $options
    ): void {
        $request =
            "INSERT INTO Location (id_location, date_debut, date_fin, compteur_debut, compteur_fin, id_voiture, id_client) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $request_result = $this->connexion->prepare($request);
        $request_result->execute([
            $id_location,
            $date_debut,
            $date_fin,
            $compteur_debut,
            $compteur_fin,
            $id_voiture,
            $id_client,
        ]);
        $DaoChoixOption = Choix_optionDao::getInstance();
        $DaoChoixOption->insertObj($id_location, $options);
    }

    public function getAllId(): array
    {
        $allObj = array();
        $request = "SELECT id_location FROM Location";
        $request_result = mysqli_query($this->connexion, $request);
        while ($data = mysqli_fetch_object($request_result)) {
            $allObj[] = $data->id_location;
        }
        return $allObj;
    }

    public function getAllImmatriculation(): array
    {
        $allObj = array();
        $request = "SELECT id_voiture FROM Location";
        $request_result = mysqli_query($this->connexion, $request);
        while ($data = mysqli_fetch_object($request_result)) {
            $allObj[] = $data->id_voiture;
        }
        return $allObj;
    }

    public function deleteFromId($id): void
    {
        $DaoChoix_option = Choix_optionDao::getInstance();
        $allOptionByLocation = $DaoChoix_option->getObjByIdLocation($id);
        if (!empty($allOptionByLocation)) {
            $DaoChoix_option->deleteFromIdLocation($id);
        }
        $request = "DELETE FROM Location WHERE id_location=$id";
        $request_result = $this->connexion->prepare($request);
        $request_result->execute();
    }
}
?>
