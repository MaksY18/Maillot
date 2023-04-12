<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Panier</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <p class="text-center fs-1 fw-bolder" >Panier : </p>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    
    <table class="table">
            <thead>
            <tr>
                <th scope="col">Produit</th>
                <th scope="col">Prix Unit.</th>
                <th scope="col">Quantité</th>
                <th scope="col">Montant</th>
                <th scope="col">Ajouter un paquet</th>
                <th scope="col">Retirer un paquet</th>
            </tr>
            </thead>
            <tbody>
    <?php
    session_start();
   
        require "config.php";
        $bdd = connect();
        $qte = 1;
        $montantHT = 0;
        $tva = "20% ";
        $fraisPort = 5;
        if (isset ($_SESSION['panier'])) {
            foreach ($_SESSION['panier'] as $id=>$quantite) {
                $sql = "SELECT * 
                FROM produit
                WHERE id=$id";
                $resultat = $bdd->query($sql);
                $produit= $resultat->fetch(PDO::FETCH_OBJ);
                $montantHT = $montantHT + $produit->prix * $quantite;
            ?>
              <tr>
                <th scope="row"> <?= $produit->nom ?> </th>
                <td> <?= $produit->prix ?> € </td>
                <td> <?= $quantite ?> </td>
                <td> <?= $produit->prix*$quantite ?> € </td>
                <td> <a href="ajout_panier2.php?id=<?= $produit->id ?>" class="link-primary"> + </a> </td>
                <td> <a href="retrait_panier.php?id=<?= $produit->id ?>" class="link-primary"> - </a> </td>
            </tr>
            <?php
            }
            $montantTVA = $montantHT*0.2;
            $TTC = $montantHT + $montantTVA + $fraisPort;
        ?>
            </tbody>
        </table>
        <br><br>


        <table class="table table-dark table-striped">
            <thead>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Total HT</th>
                    <td> <?= $montantHT ?> € </td>
                </tr>
                <tr>
                    <th scope="row">TVA (20%)</th>
                    <td> <?= $montantTVA ?> € </td>
                </tr>
                <tr>
                    <th scope="row">Frais de port</th>
                    <td> <?= $fraisPort ?> € </td>
                </tr>
                <tr>
                    <th scope="row">Total TTC</th>
                    <td> <?= $TTC ?> € </td>
                </tr>
            </tbody>
        </table>
        <?php } ?>

        <a class="btn btn-primary" href="index.php" role="button">Continuer mes achats </a> <br><br>
        <a class="btn btn-primary" href="index.php" role="button">Payer </a> <br><br>
        <a class="btn btn-primary" href="vider.php" role="button">Vider le panier </a> <br><br>

</body>

</html>