// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


function popUpPayer() {
    var txt;
    if (confirm("Voulez vous valider vote achat ?") == true) {
        txt = "Felicitation ! Votre commande vous sera livré dans quelques minutes";

    } else {
        txt = "Vous venez d'annuler votre commande.";
    }
    document.getElementById("demo").innerHTML = txt;
}
