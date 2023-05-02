<?php
function connexionDatabase(): mysqli
{
    require_once "acces.php";
    // return mysqli_connect(SERVEUR, LOGIN, MDP, BD);
    return new mysqli(SERVEUR, LOGIN, MDP, BD);
}
?>