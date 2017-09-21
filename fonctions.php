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
      echo "Connexion reussie";
      echo "<br/>";
      echo $_SESSION['idUtilisateur'];
      echo "<br/>";
      echo $_SESSION['nom'];
      echo "<br/>";
      echo $_SESSION['prenom'];
      echo "<br/>";
      echo $_SESSION['email'];
      echo "<br/>";
      echo $_SESSION['type'];
    }else{
      echo "Utilisateur inconnu";
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
?>
