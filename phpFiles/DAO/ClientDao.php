<?php
require_once "../../phpFiles/classes/ClientClass.php";
require_once "../../phpFiles/DAO/Type_clientDao.php";
require_once "../../phpFiles/DAO/LocationDao.php";
require_once "../../phpFiles/tools/biblio.php";

class ClientDao
{
    private static ClientDao $instance;
    private $connexion;

    private function __construct()
    {
        $this->connexion = connexionDatabase();
    }

    public static function getInstance(): ClientDao
    {
        if (!isset(self::$instance)) {
            self::$instance = new ClientDao();
        }
        return self::$instance;
    }
    public function dictToObj($data): ClientClass
    {
        $DaoType_client = Type_clientDao::getInstance();
        $type_client = $DaoType_client->getObjById($data->id_type_client);
        return new ClientClass(
            $data->id_client,
            $data->nom,
            $data->prenom,
            $data->adresse,
            $type_client
        );
    }
    public function getObjById($id): ?ClientClass
    {
        $request = "SELECT * FROM Client WHERE id_client=$id";
        $request_result = mysqli_query($this->connexion, $request);
        $data = mysqli_fetch_object($request_result);
        if ($data != null) {
            return $this->dictToObj($data);
        } else {
            return null;
        }
    }

    public function getLastObj(): ?ClientClass
    {
        $request = "SELECT * FROM Client ORDER BY id_client DESC LIMIT 1";
        $request_result = mysqli_query($this->connexion, $request);
        $data = mysqli_fetch_object($request_result);
        if ($data != null) {
            return $this->dictToObj($data);
        } else {
            return null;
        }
    }

    public function getAllId(): array
    {
        $allObj = array();
        $request = "SELECT id_client FROM Client";
        $request_result = mysqli_query($this->connexion, $request);
        while ($data = mysqli_fetch_object($request_result)) {
            $allObj[] = $data->id_client;
        }
        return $allObj;
    }

    public function getAllObj(): array
    {
        $allObj = array();
        $request = "SELECT * FROM Client";
        $request_result = mysqli_query($this->connexion, $request);
        while ($data = mysqli_fetch_object($request_result)) {
            $allObj[] = $this->dictToObj($data);
        }
        return $allObj;
    }

    public function getAllIdWithLocation(): array
    {
        $allObj = array();
        $request =
            "SELECT id_client FROM `Client` RIGHT JOIN Location USING(id_client)";
        $request_result = mysqli_query($this->connexion, $request);
        while ($data = mysqli_fetch_object($request_result)) {
            $allObj[] = $data->id_client;
        }
        return $allObj;
    }

    public function getAllColumnsNames(): array
    {
        $allNames = array();
        $request =
            "SELECT Column_name FROM Information_schema.columns WHERE Table_name LIKE 'Client'";
        $request_result = mysqli_query($this->connexion, $request);
        while ($ligne_name = mysqli_fetch_object($request_result)) {
            $allNames[] = $ligne_name->Column_name;
        }
        return $allNames;
    }

    public function editObj(
        $id_client,
        $nom,
        $prenom,
        $adresse,
        $id_type_client
    ): void {
        if ($nom != null) {
            $request = "UPDATE Client SET nom='$nom' WHERE id_client=$id_client";
            $request_result = $this->connexion->prepare($request);
            $request_result->execute();
        }
        if ($prenom != null) {
            $request = "UPDATE Client SET prenom='$prenom' WHERE id_client=$id_client";
            $request_result = $this->connexion->prepare($request);
            $request_result->execute();
        }
        if ($adresse != null) {
            $request = "UPDATE Client SET adresse='$adresse' WHERE id_client=$id_client";
            $request_result = $this->connexion->prepare($request);
            $request_result->execute();
        }
        if ($id_type_client != null) {
            $request = "UPDATE Client SET id_type_client=$id_type_client WHERE id_client=$id_client";
            $request_result = $this->connexion->prepare($request);
            $request_result->execute();
        }
    }

    public function insertObj(
        $id_client,
        $nom,
        $prenom,
        $adresse,
        $id_type_client
    ): void {
        $request =
            "INSERT INTO Client (id_client, nom, prenom, adresse, id_type_client) VALUES (?, ?, ?, ?, ?)";
        $request_result = $this->connexion->prepare($request);
        $request_result->execute([
            $id_client,
            $nom,
            $prenom,
            $adresse,
            $id_type_client,
        ]);
    }
    public function deleteFromId($id): void
    {
        $DaoLocation = LocationDao::getInstance();
        $allLocationByIdClient = $DaoLocation->getAllObjByIdClient($id);
        foreach ($allLocationByIdClient as $location) {
            $DaoLocation->deleteFromId($location->getId());
        }
        $request = "DELETE FROM Client WHERE id_client='$id'";
        $request_result = $this->connexion->prepare($request);
        $request_result->execute();
    }
}
?>
