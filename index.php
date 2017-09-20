<?php
session_start(); // Permet de reutiliser du PHP dans une autre page seulement en rappeler la fonction session_start();
$bdd = new PDO("mysql:host=localhost;dbname=leboncoin;charset=utf8","root","");
// $bdd = new PDO("mysql:host=localhost;dbname=leboncoin;charset=utf8","root","");
?>
<!DOCTYPE html>
<html lang="fr">
@@ -12,7 +12,7 @@ $bdd = new PDO("mysql:host=localhost;dbname=leboncoin;charset=utf8","root","");
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LaZone e-commerce Accueil</title>
    <title>PizzaTen Accueil</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
@@ -29,7 +29,7 @@ $bdd = new PDO("mysql:host=localhost;dbname=leboncoin;charset=utf8","root","");
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">LaZone</a>
        <a class="navbar-brand" href="#">PizzaTen</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
@@ -41,28 +41,26 @@ $bdd = new PDO("mysql:host=localhost;dbname=leboncoin;charset=utf8","root","");
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">DEPOSER UNE ANNONCE</a>
              <a class="nav-link" href="#">LA CARTE</a>
            </li>
            <li class="nav-item">
            <!-- <li class="nav-item">
              <a class="nav-link" href="#">DEMANDES</a>
            </li>
            </li> -->
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

Unknown
authored20/9/2017 @ 11:18
commit:7dbd49
parent:366211
1 modified
1 added
Name
Full Path
deconnexion.php
index.php
File History: index.php
Diff ViewFile View
Show blame details
Changement site vente Pizzas en ligne
il y a 2 heures by Unknown
7dbd49
Mise en place pages
il y a 21 heures by Kevin Achiche
366211
Page d'accueil MAJ
il y a un jour by Kevin Achiche
3774ac
RENAMED from index.html
End of History
3774ac
1
<?php
2
session_start(); // Permet de reutiliser du PHP dans une autre page seulement en rappeler la fonction session_start();
7dbd49
3
// $bdd = new PDO("mysql:host=localhost;dbname=leboncoin;charset=utf8","root","");
3774ac
4
?>
7dbd49
5
<!DOCTYPE html>
3774ac
6
<html lang="fr">
7dbd49
7
8
  <head>
9
10
    <meta charset="utf-8">
11
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
12
    <meta name="description" content="">
13
    <meta name="author" content="">
14
15
    <title>PizzaTen Accueil</title>
16
17
    <!-- Bootstrap core CSS -->
366211
18
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
7dbd49
19
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
366211
20
    <link href="vendor/bootstrap/css/font-awesome.min.css" rel="stylesheet">
7dbd49
21
22
    <!-- Custom styles for this template -->
23
    <link href="css/shop-homepage.css" rel="stylesheet">
24
25
  </head>
26
27
  <body>
28
29
    <!-- Navigation -->
30
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
31
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
