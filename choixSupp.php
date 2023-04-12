<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>choixSupp</title>
    <link rel="stylesheet" href="style.css">

    <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Menu admin
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="formAjout.php">Ajouter un produit</a></li>
            <li><a class="dropdown-item" href="choixSupp.php">Supprimer un produit</a></li>
            <li><a class="dropdown-item" href="#">Modifier un produit</a></li>
        </ul>
    </div>

</head>

<body>
    <p class="text-center fs-1 fw-bolder" >Boutique : </p>

    <?php //$recherche = "recherche"; ?>
    <form action="recherche.php" method="POST">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Nom du produit" name="recherche" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Rechercher</button>
                </form>
            </div>
        </nav>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

        <?php
        require "config.php";
        $bdd = connect();

        $sql = "select * from produit";
        $resultat = $bdd->query($sql); ?>


        <?php
        while ($produit = $resultat->fetch(PDO::FETCH_OBJ)) {
        ?>
            <div class="card" style="width: 18rem;">
                <img src="Images/<?= $produit->photo ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> <?= $produit->nom ?> </h5>
                    <p class="card-text"> <?= $produit->prix ?>€ </p>
                    <a href="supp.php?id=<?= $produit->id ?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Supprimer</a>
                </div>
            </div>
        <?php
        }
        ?>
</body>

</html>