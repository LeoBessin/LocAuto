<?php
include "../../phpFiles/DAO/ClientDao.php";
include "../../phpFiles/widgets/html-part.php";
$DaoClient = ClientDao::getInstance();
$id = $_POST['id'];
$lastName = $_POST['lastName'];
$name = $_POST['name'];
$address = $_POST['address'];
$idTypeClient = $_POST['idTypeClient'];
fileStart();
navBar();
?>
<h1 class="font font-bold text-gre-900 text-2xl py-3 flex justify-center">Essaie de l'ajout du client à la table...</h1>
<?php
$DaoClient->insertObj($id,$lastName,$name,$address,$idTypeClient);
$allClient = $DaoClient->getAllId();
if (in_array($id,$allClient)){
    echo '
<div class="flex flex-col justify-center items-center mt-8">
    <ul class="max-w-md space-y-2 text-gray-500 list-inside flex justify-center flex-wrap flex-col">
        <li class="flex justify-center">
            <svg aria-hidden="true" class="w-12 h-5 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            <p class="text-xl">Succés !</p>
        </li>
    </ul>
    <a class="p-4 rounded-lg mt-8 text-white font-bold" style="background: #06D6A0" href="../Client/index.php" >Redirection vers l annuaire des clients</a>
</div>';

}



?>

<?php
fileEnd();
?>
