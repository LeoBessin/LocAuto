<?php
include "DAO/Type_clientDao.php";
$DaoType_client = Type_clientDao::getInstance();
$allType_client = $DaoType_client->getAllObj();
foreach ($allType_client as $type_client){
    echo $type_client->getId();
    echo $type_client->getLibelle();
    echo "<br>";
}
?>