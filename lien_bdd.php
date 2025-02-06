<?php
//les codes de la bases de données ne sont pas sur github
require_once("codes_bdd.php");
$link = mysqli_connect($lien, $nom, $mdp, $table); 

if (!$link) {
    die('Erreur de connexion (' . mysqli_connect_errno() . ') '
    . mysqli_connect_error());
   }
?>