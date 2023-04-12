<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Modif1</title>
  </head>
  <body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

<?php
session_start();
$id = $_GET["id"];

require "config.php";
$bdd = connect();
$sql = "SELECT *
        FROM produit
        WHERE id=$id";

$resultat_modif = $bdd->exec($sql);

$nom_prod = "nom_prod";
$prix_prod = "prix_prod";
$image_prod = "image_prod";
$_SESSION["id"] = $id
?>
  <form action="modif2.php" method="POST" enctype="multipart/form-data">
  Nouveau nom du produit : <input type="text" size="25" name="nom_prod">
  <br>
  <br>
  Nouveau prix du produit : <input type="text" size="25" name="prix_prod">
  <br>
  <br>
  Nouvelle image du produit : <input type="file" size="25" name="image_prod">
  <br>
  <br>
    <input type="submit" size="20" value="Enregistrer">
  </form>
</body>
</html>
