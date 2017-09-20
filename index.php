<?php
session_start(); // Permet de reutiliser du PHP dans une autre page seulement en rappeler la fonction session_start();
// $bdd = new PDO("mysql:host=localhost;dbname=leboncoin;charset=utf8","root","");
$bdd = new PDO("mysql:host=localhost;dbname=leboncoin;charset=utf8","root","");
?>
<!DOCTYPE html>
<html lang="fr">
@@ -12,7 +12,7 @@ $bdd = new PDO("mysql:host=localhost;dbname=leboncoin;charset=utf8","root","");
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PizzaTen Accueil</title>
    <title>LaZone e-commerce Accueil</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
@@ -29,7 +29,7 @@ $bdd = new PDO("mysql:host=localhost;dbname=leboncoin;charset=utf8","root","");
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">PizzaTen</a>
        <a class="navbar-brand" href="#">LaZone</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
@@ -41,28 +41,26 @@ $bdd = new PDO("mysql:host=localhost;dbname=leboncoin;charset=utf8","root","");
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">LA CARTE</a>
              <a class="nav-link" href="#">DEPOSER UNE ANNONCE</a>
            </li>
            <!-- <li class="nav-item">
            <li class="nav-item">
              <a class="nav-link" href="#">DEMANDES</a>
            </li> -->
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">PANIER<span class='badge'>3</span></a>
            </li>
            <li class="nav-item">
              <?php
                if (isset ($_SESSION['mail']))
                  {
                    echo "<li><a href='deconnexion.php'><span class='glyphicon glyphicon-remove'></span> Deconnexion</a></li>";
                    echo "<li class='nav-item'><a href='deconnexion.php'><span class='glyphicon glyphicon-remove'></span>Deconnexion</a></li>";
                    echo "<li onclick='.document.getElementById('id01').style.display='block''><a class='nav-link' href='#'>Mon Compte</a></li>"; //Appel de la fonction onclick
                  }else
                  {
                    echo "<li><a href='inscription.php'><span class='glyphicon glyphicon-pencil'></span> Inscrivez-vous</a></li>";
                    echo "<li class='nav-item'><a class='nav-link' href='inscription.php'>Inscrivez-vous</a></li>";
                  }
              ?>
              <li onclick="document.getElementById('id01').style.display='block'"><a class="nav-link" href="inscription.php">Mon Compte</a> <!-- Appel de la fonction onclick -->
            </li>
            <div id="id01" class="modal">
            		if (isset ($_SESSION['mail']))
            			{
            				echo "<li><a href='deconnexion.php'><span class='glyphicon glyphicon-remove'></span> Deconnexion</a></li>";
            			}else
            			{
            				echo "<li><a href='inscription.php'><span class='glyphicon glyphicon-pencil'></span> Inscrivez-vous</a></li>";
            			}
          		?>
              <li onclick="document.getElementById('id01').style.display='block'"><a class="nav-link" href="inscription.php">Mon Compte</a> <!-- Appel de la fonction onclick -->
            </li>
            <div id="id01" class="modal">

  <form class="modal-content animate" method="post" action="index.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
@@ -77,7 +75,6 @@ $bdd = new PDO("mysql:host=localhost;dbname=leboncoin;charset=utf8","root","");
      <input type="password" placeholder="Entrer un mot de passe" name="mdp" required><br/>

      <button class="button1" type="submit" name="seconnecter">Connexion</button><br/>
      <input type="checkbox" name="rememberMe" id="rememberCheckbox"/> <label for="rememberCheckbox">Se souvenir de moi
	  <span class="psw">Mot de passe <a href="# ">oublié ?</a></span>
    </div>

Changement site vente Pizzas en ligne

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <?php
            if(isset($_POST['valider']))
            {
              echo "<div align='center'><h1>"."Vous venez de vous inscrire !"."</h1></div><br/><br/>";
              
            }
          ?>

          <h1 class="my-4">Catégories</h1>
          <div class="list-group">
            <a href="#" class="list-group-item">Véhicules</a>
            <a href="#" class="list-group-item">Multimédia</a>
            <a href="#" class="list-group-item">Vetements</a>
            <a href="#" class="list-group-item">Bijoux</a>
            <a href="#" class="list-group-item">Chaussures</a>
            <a href="#" class="list-group-item">Livres</a>
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
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
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

          <div class="row">

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Item One</a>
                  </h4>
                  <h5>$24.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Item Two</a>
                  </h4>
                  <h5>$24.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Item Three</a>
                  </h4>
                  <h5>$24.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Item Four</a>
                  </h4>
                  <h5>$24.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Item Five</a>
                  </h4>
                  <h5>$24.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Item Six</a>
                  </h4>
                  <h5>$24.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

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
32
        <a class="navbar-brand" href="#">PizzaTen</a>
33
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
34
          <span class="navbar-toggler-icon"></span>
35
        </button>
36
        <div class="collapse navbar-collapse" id="navbarResponsive">
37
          <ul class="navbar-nav ml-auto">
38
            <li class="nav-item active">
3774ac
39
              <a class="nav-link" href="#">ACCUEIL
7dbd49
40
                <span class="sr-only">(current)</span>
41
              </a>
42
            </li>
43
            <li class="nav-item">
44
              <a class="nav-link" href="#">LA CARTE</a>
45
            </li>
46
            <!-- <li class="nav-item">
3774ac
47
              <a class="nav-link" href="#">DEMANDES</a>
