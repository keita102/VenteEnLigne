<div id="id01" class="modal">
  <form class="modal-content animate" method="post" action="index.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/logoPizza.png" alt="Avatar" class="avatar">
    </div>

    <div align="center" class="container">
      <label><b>Utilisateur</b></label>
      <input type="email" placeholder="Entrer votre mail" name="emailUser" required><br/><br/>

      <label><b>Mot de passe</b></label>
      <input type="password" placeholder="Entrer un mot de passe" name="mdpUser" required><br/>

      <button class="button1" type="submit" name="seconnecterUser">Connexion</button><br/>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annuler</button>
    </div>
  </form>
</div>
