<?php
function connexion() {
    require_once "acces.php";
    return mysqli_connect(SERVEUR, LOGIN, MDP, BD);
}
?>