<?php
session_start();
$id = $_SESSION["id"];
$nom_prod = $_POST["nom_prod"];
$prix_prod = $_POST["prix_prod"];
$image_prod = $_FILES["image_prod"]["name"];

$chemin = "Images/$image_prod";
move_uploaded_file($_FILES["image_prod"]["tmp_name"], $chemin);

require "config.php";
$bdd = connect();
$sql = "UPDATE produit
        SET nom='$nom_prod', prix='$prix_prod', photo='$image_prod'
        WHERE id=$id";

$resultat = $bdd->exec($sql);

header("location:index.php");
