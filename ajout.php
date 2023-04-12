<?php
session_start();
$nom_prod = $_POST["nom_prod"];
$prix_prod = $_POST["prix_prod"];
$image_prod = $_FILES["image_prod"]["name"];

$chemin = "Images/$image_prod";
move_uploaded_file($_FILES["image_prod"]["tmp_name"], $chemin);

require "config.php";
$bdd = connect();
$sql = "insert into produit (nom, prix, photo)
        values ('$nom_prod', $prix_prod, '$image_prod')";

$resultat = $bdd->exec($sql);

header("location:index.php");
