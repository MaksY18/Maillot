<?php
session_start();
$identifiant = $_POST["identifiant"];
$mdp = $_POST["mdp"];

require "config.php";
$bdd = connect();

$sql = "SELECT mdp, login
        FROM admin
        WHERE login = '$identifiant' and mdp='$mdp'";

$resultat = $bdd->query($sql);

$nb_lignes = $resultat->rowCount();
if ($nb_lignes==0) {
    $_SESSION["message"]="Vous ne pouvez pas vous connecter avec ces identifiants" ;
    header("location:admin.php");
}
else {
    $_SESSION["autorisation"]="OK";
    header("location:accueil-admin.php");
}
