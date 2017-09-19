<html>
	<body>
    <head>
      <meta charset="utf-8">
    </head>
	<div class="form-style-6" align="center">
		<h2> Inscrivez vous </h2><br/>
		<div>
		<form method="post" action ="index.php">
				<td>
				<td>
          <h1><label>Nom</label></h1><input type="text" name="nom" placeholder="Nom de famille" required data-validation-required-message="Veuillez entrer votre Nom.">
          <h1><label>Prénom</label></h1><input type="text" name="prenom" placeholder="Prénom" required data-validation-required-message="Veuillez entrer votre Prénom.">
          <h1><label>Date de Naissance</label></h1> <input type="date" name="birth">
				</td>
				<td>
  				<h1><label>Civilité</label></h1><h3><input type="radio" name="civilite" value="femme" />Femme&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="sexe" value="homme" />Homme</h3>
          <h1><label>Mail</label></h1> <input type="email" name="mail" placeholder="Adresse mail" required>
          <h1><label>Mot de passe</label></h1> <input type="password" placeholder="Mot de passe" size="25" name="mdp"/>
				</td>
				</td>
				<h3><input type="submit" name="valider" value="Valider l'inscription"></h3>
		</form>
		</div>
	</div>
	</body>
</html>
