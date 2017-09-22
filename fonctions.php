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
      if($_SESSION['type'] == 'admin'){
        echo "Vous etes connecter en tant qu'administrateur : ";
      }else{
        echo "Vous etes connecter en tant que client : ";
      }
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


//Fonction selectionProduit qui selectionne tout les produits
function selectionProduit($bdd){
    $sqlProduit = $bdd->query("SELECT * FROM produit");
    while($unProduit = $sqlProduit->fetch()){
?>
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <img class="card-img-top" src="<?php echo $unProduit['urlPhoto']; ?>" alt="">
        <div class="card-body">
          <h4 class="card-title">
            <?php echo $unProduit['nomProduit']; ?>
          </h4>
          <h5><?php echo $unProduit['prixProduit']."€"; ?></h5>
          <p class="card-text"><?php echo $unProduit['descriptionProduit']; ?></p>
        </div>
        <div class="card-footer">
          <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
        </div>
      </div>
    </div>
  <?php
    }
}


//Fonction selectionP qui selectionne les produits en fonction du produit desirer $produit
function selectionP($bdd, $produit){
    $sqlProduit = $bdd->query("SELECT * FROM produit WHERE categorie = '$produit'");
    while($unProduit = $sqlProduit->fetch()){
?>
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <img class="card-img-top" src="<?php echo $unProduit['urlPhoto']; ?>" alt="">
        <div class="card-body">
          <h4 class="card-title">
          <?php echo $unProduit['nomProduit']; ?>
          </h4>
          <h5><?php echo $unProduit['prixProduit']."€"; ?></h5>
          <p class="card-text"><?php echo $unProduit['descriptionProduit']; ?></p>
        </div>
      <form method="GET" action="#">
        <div class="card-footer">
          <input type="hidden" name="nomP" value="<?php echo $unProduit['nomProduit']; ?>">
          <?php
            if(isset($_SESSION['type']) && $_SESSION['type'] == 'client'){ // Si l'on se connecte en tant que client
          ?>
              Quantité : <input type="number" name="quantityProduit" min="0" max="50">
              <button type="submit" name="validerCommande" onclick="popUpPayer()">Valider la commande</button>
              <!-- <input type="submit" name="validerCommande" value="Valider la commande"> -->
              <input type="submit" name="validerPanier" value="Mettre dans le panier">
          <?php
        }elseif(isset($_SESSION['type']) && $_SESSION['type'] == 'admin'){ // Si l'on se connecte en tant qu'admin
          ?>
              <?php echo $unProduit['nomProduit']; echo ' : '.$unProduit['nbrProduit'].' produits<br/>';?>
              Modifier le nombre de produits : <input type="number" name="nombreProduit" min="0" max="10000">
              <input type="submit" name="insertProduit" value="Valider">
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


//Fonction updateProduit qui modifie le nombre de produits dans la BDD (gere le stock)
function updateProduit($bdd, $produit){
  if(isset($_GET['nombreProduit']))
  {
    $nombreProduit = $_GET['nombreProduit'];
    $nomP = $_GET['nomP'];

    $sqlAddProduit = "UPDATE produit SET nbrProduit = '$nombreProduit' WHERE nomProduit = '$nomP' "; //Modifie le nombre  de desserts dns la BDD
    $bdd->exec($sqlAddProduit);
    echo "Vous venez d'ajouter ".$nombreProduit." ".$produit." de ".$nomP;
  }
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//Fonction calculePrix qui calcule le nombre de produits et le multiplie par le prix dans la BDD (gere le stock)
function calculePrix($bdd){
  if(isset($_GET['quantityProduit']) && isset($_GET['validerCommande']))
  {
    $quantityProduit = $_GET['quantityProduit'];
    $nomP = $_GET['nomP'];

    $sqlProduit = $bdd->query("SELECT prixProduit FROM produit WHERE nomProduit = '$nomP'");
    $resultat = $sqlProduit->fetch();
    $prixUnite = $resultat['prixProduit'];
    $total = $prixUnite * $quantityProduit;

    echo "Felicitation ! Votre commande vous sera livré dans quelques minutes, pour un montant total de ".$total."€";

    ?>
    <p id="demo"></p>
    <?php
  }
}
?>


</html>
