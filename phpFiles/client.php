<?php
include "DAO/ClientDao.php";
$DaoClient = ClientDao::getInstance();
$allClient = $DaoClient->getAllObj();
foreach ($allClient as $client){
    echo $client->getId();
    echo $client->getNom();
    echo $client->getPrenom();
    echo $client->getAdresse();
    echo $client->getType_client()->getLibelle();
    echo "<br>";
}
?>