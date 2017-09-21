<?php
session_start(); // Permet de reutiliser du PHP dans une autre page seulement en rappeler la fonction session_start();
$bdd = new PDO("mysql:host=localhost;dbname=pizzaten;charset=utf8","root",""); //Variable de connexion a la BDD pizzaten
include("fonctions.php"); //On inclut la page fonction.php qui contient toute les fonctions a utiliser sur cette page
include("connexion.php");
connexionUser($bdd);
?>
<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PizzaTen Accueil</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/my_account.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">PizzaTen</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">ACCUEIL
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="lacarte.php">LA CARTE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="lespizzas.php">LES PIZZAS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="lesdesserts.php">LES DESSERTS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="lesboissons.php">LES BOISSONS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">PANIER<span class='badge'>3</span></a>
            </li>

              <?php
            		if(isset ($_SESSION['email'])){
                  if($_SESSION['type'] == 'admin'){
                    echo "<li class='nav-item'><a class='nav-link' href='#'>Mon Compte Administrateur</a></li>";
                  }else{
                    echo "<li class='nav-item'><a class='nav-link' href='#'>Mon Compte Client</a></li>";
                  }
                  echo "<li class='nav-item'><a class='nav-link' href='deconnexion.php'>Deconnexion</a></li>";
            		}else{
                  echo "<li onclick=\"document.getElementById('id01').style.display='block'\"><a class='nav-link' href='#'><span class='glyphicon glyphicon-user'></span>Connexion</a></li>"; //Appel de la fonction onclick
                  echo "<li class='nav-item'><a class='nav-link' href='inscription.php'>Inscrivez-vous</a></li>";
            		}
          		?>

          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <?php
            inscription($bdd); //Appel de la fonction inscription
          ?>

          <h1 class="my-4">Commandez en ligne !</h1>
          <div class="list-group">
            <a href="lespizzas.php" class="list-group-item">Les Pizzas</a>
            <a href="lesdesserts.php" class="list-group-item">Les Desserts</a>
            <a href="lesboissons.php" class="list-group-item">Les Boissons</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="images/logoPizza.png" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="images/pizzeria1.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="images/pizzeria2.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <?php
            connexion($bdd); //Appel de la fonction connexion
          ?>

          <div class="row">

          <?php
            selectionProduit($bdd); //Appel de la fonction selectionProduit
          ?>

          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Kevin Achiche 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/bootstrap/js/formulaire_connexion.js"></script>

  </body>

</html>
