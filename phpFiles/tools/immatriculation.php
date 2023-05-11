<?php
include "../DAO/VoitureDao.php";
$DaoVoiture = VoitureDao::getInstance();
$allImmatriculation = $DaoVoiture->getAllId();
$alphabet = range('a', 'z');
function create_id_car(){
    global $alphabet, $allImmatriculation;
    $firstNb = sprintf('%03d', random_int(1,999));
    $secondNb = sprintf('%03d', random_int(1,999));
    $letters = "";
    for($i=0;$i<3;$i++){
        $new_letter = strval($alphabet[array_rand($alphabet,1)]);
        $letters.=$new_letter;
    }
    $newImmatriculation = $firstNb.' '.strtoupper($letters).' '.$secondNb;
    echo $newImmatriculation;
    while (in_array($newImmatriculation,$allImmatriculation)){
        $firstNb = sprintf('%03d', random_int(1,999));
        $secondNb = sprintf('%03d', random_int(1,999));
        $letters = "";
        for($i=0;$i<3;$i++){
            $new_letter = strval($alphabet[array_rand($alphabet,1)]);
            $letters.=$new_letter;
        }
        $newImmatriculation = $firstNb.' '.strtoupper($letters).' '.$secondNb;
    }
}
create_id_car();