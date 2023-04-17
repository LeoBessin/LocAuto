<?php
function connexionDatabase() {
    require_once "acces.php";
    return mysqli_connect(SERVEUR, LOGIN, MDP, BD);
}
?>