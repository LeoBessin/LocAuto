<?php
include "../../phpFiles/DAO/ClientDao.php";
include "../../phpFiles/widgets/html-part.php";
$DaoClient = ClientDao::getInstance();
$allClient = $DaoClient->getAllObj();
$columnsNames = $DaoClient->getAllColumnsNames();
fileStart();
navBar();?>
<h1 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Ajout d'une voiture</h1>

<?php
fileEnd();
?>


