<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
<?php
$bdd = new PDO("mysql:host=localhost;dbname=pizzaten;charset=utf8","root",""); //Variable de connexion a la BDD pizzaten

//Fonction inscription client a la BDD
function inscription($bdd){
  if(isset($_POST['validerInscription']))
  {
    $nomC = $_POST['nomInscription'];
    $prenomC = $_POST['prenomInscription'];
    $birthC = $_POST['birthInscription'];
    $emailC = $_POST['emailInscription'];
    $mdpC = $_POST['mdpInscription'];

    echo "<div align='center'><h1>"."Vous venez de vous inscrire !"."</h1></div><br/><br/>";
    $sql = "INSERT INTO utilisateur (nom, prenom, birth, email, mdp, type)
            VALUES ('$nomC', '$prenomC', '$birthC', '$emailC', '$mdpC', 'client')";
    $bdd->exec($sql);
    echo "Veuillez vous connecter pour accéder à vos commandes";
  }
}


//Fonction connexion utilisateur(client/admin) a la BDD
function connexion($bdd){
  if(isset($_POST['seconnecterUser'])){
    $mail = $_POST['emailUser'];
    $mdp = $_POST['mdpUser'];

    $sqlUser = $bdd->query("SELECT * FROM utilisateur WHERE email = '$mail' AND mdp = '$mdp'");
    $resultat = $sqlUser->fetch();

    if($resultat != false){
      echo "Vous etes connecter en tant qu'administrateur : ";
      echo "<br/>";
      echo $_SESSION['nom'];
      echo " ";
      echo $_SESSION['prenom'];
      echo "<br/><br/>";
      // echo $_SESSION['email'];
      // echo "<br/>";
      // echo $_SESSION['type'];
    }else{
      echo "Veuillez entrer des identifiants correct ou bien vous inscrire en cliquant <a href='inscription.php'>ici</a><br/><br/>";
    }
  }
}


//Fonction connexion utilisateur(client/admin) a la BDD
function connexionUser($bdd){
  if(isset($_POST['seconnecterUser'])){
    $mail = $_POST['emailUser'];
    $mdp = $_POST['mdpUser'];

    $sqlUser = $bdd->query("SELECT * FROM utilisateur WHERE email = '$mail' AND mdp = '$mdp'");
    $resultat = $sqlUser->fetch();

    if($resultat != false){
      $_SESSION['idUtilisateur'] = $resultat['idUtilisateur'];
      $_SESSION['nom'] = $resultat['nom'];
      $_SESSION['prenom'] = $resultat['prenom'];
      $_SESSION['birth'] = $resultat['birth'];
      $_SESSION['adresse'] = $resultat['adresse'];
      $_SESSION['cp'] = $resultat['cp'];
      $_SESSION['ville'] = $resultat['ville'];
      $_SESSION['tel'] = $resultat['tel'];
      $_SESSION['email'] = $resultat['email'];
      $_SESSION['mdp'] = $resultat['mdp'];
      $_SESSION['type'] = $resultat['type'];
    }
  }
}


//Fonction selectionPizza qui selectionne seulement les pizzas
function selectionPizza($bdd){
    $sqlProduit = $bdd->query("SELECT * FROM produit WHERE categorie = 'pizza'");
    while($unePizza = $sqlProduit->fetch()){
?>
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <a href="#"><img class="card-img-top" src="<?php echo $unePizza['urlPhoto']; ?>" alt=""></a>
        <div class="card-body">
          <h4 class="card-title">
            <a href="#"><?php echo $unePizza['nomProduit']; ?></a>
          </h4>
          <h5><?php echo $unePizza['prixProduit']."€"; ?></h5>
          <p class="card-text"><?php echo $unePizza['descriptionProduit']; ?></p>
        </div>
        <div class="card-footer">
          <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
        </div>
      </div>
    </div>
  <?php
    }
}


//Fonction selectionProduit qui selectionne tout les produits
function selectionProduit($bdd){
    $sqlProduit = $bdd->query("SELECT * FROM produit");
    while($unePizza = $sqlProduit->fetch()){
?>
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <a href="#"><img class="card-img-top" src="<?php echo $unePizza['urlPhoto']; ?>" alt=""></a>
        <div class="card-body">
          <h4 class="card-title">
            <a href="#"><?php echo $unePizza['nomProduit']; ?></a>
          </h4>
          <h5><?php echo $unePizza['prixProduit']."€"; ?></h5>
          <p class="card-text"><?php echo $unePizza['descriptionProduit']; ?></p>
        </div>
        <div class="card-footer">
          <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
        </div>
      </div>
    </div>
  <?php
    }
}


//Fonction selectionBoisson qui selectionne seulement les boissons
function selectionBoisson($bdd){
    $sqlProduit = $bdd->query("SELECT * FROM produit WHERE categorie = 'boisson'");
    while($unePizza = $sqlProduit->fetch()){
?>
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <a href="#"><img class="card-img-top" src="<?php echo $unePizza['urlPhoto']; ?>" alt=""></a>
        <div class="card-body">
          <h4 class="card-title">
            <a href="#"><?php echo $unePizza['nomProduit']; ?></a>
          </h4>
          <h5><?php echo $unePizza['prixProduit']."€"; ?></h5>
          <p class="card-text"><?php echo $unePizza['descriptionProduit']; ?></p>
        </div>
        <div class="card-footer">
          <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
        </div>
      </div>
    </div>
  <?php
    }
}


//Fonction selectionDessert qui selectionne seulement les desserts
function selectionDessert($bdd){
    $sqlProduit = $bdd->query("SELECT * FROM produit WHERE categorie = 'dessert'");
    while($unePizza = $sqlProduit->fetch()){
?>
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <a href="#"><img class="card-img-top" src="<?php echo $unePizza['urlPhoto']; ?>" alt=""></a>
        <div class="card-body">
          <h4 class="card-title">
            <a href="#"><?php echo $unePizza['nomProduit']; ?></a>
          </h4>
          <h5><?php echo $unePizza['prixProduit']."€"; ?></h5>
          <p class="card-text"><?php echo $unePizza['descriptionProduit']; ?></p>
        </div>
      <form method="POST" action="#">
        <div class="card-footer">
          <?php
            if(isset($_SESSION['type']) && $_SESSION['type'] == 'client'){ // Si l'on se connecte en tant que client
          ?>
              Quantité : <input type="number" name="quantityDessert" min="0" max="100">
              <input type="submit" name="validerCommande" value="Valider la commande">
              <input type="submit" name="validerPanier" value="Mettre dans le panier">
          <?php
        }elseif(isset($_SESSION['type']) && $_SESSION['type'] == 'admin'){ // Si l'on se connecte en tant qu'admin
          ?>
              Ajouter : <input type="number" name="nbrDessert" min="0" max="100">
              <input type="submit" name="insertDessert" value="Valider">
          <?php
            }
          ?>
        </div>
      </form>
      </div>
    </div>
  <?php
    }
}


//Fonction updateProduit qui modifie le nombre de produits dans la BDD
function updateProduit($bdd){
  if(isset($_POST['nbrDessert']))
  {
    $nbrDessert = $_POST['nbrDessert'];
    $test = $unePizza['nomProduit'];
    
    $sqlAddProduit = "UPDATE produit SET nbrProduit = '$nbrDessert' WHERE nomProduit = '$test' ";
    $bdd->exec($sqlAddProduit);
    echo "Vous venez d'ajouter ".$nbrDessert." desserts";
  }
}
?>


</html>
