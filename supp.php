<?php
session_start();
$id = $_GET["id"];

require "config.php";
$bdd = connect();
$sql = "DELETE FROM produit
        WHERE id=$id";

$resultat = $bdd->exec($sql);
header("location:index.php");
