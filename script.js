document.getElementById("emargement-form").addEventListener("submit", function(event) {
  event.preventDefault(); // Empêche le comportement par défaut du formulaire

  var nom = document.getElementById("nom").value;
  var prenom = document.getElementById("prenom").value;
  var email = document.getElementById("email").value;

  // Ajouter les valeurs à la liste d'émargement
  var emargementListe = document.getElementById("emargement-liste");
  var nouveauEmargement = document.createElement("p");
  nouveauEmargement.textContent = "Nom: " + nom + " - Prénom: " + prenom + " - Email: " + email;
  emargementListe.appendChild(nouveauEmargement);

  // Réinitialiser le formulaire
  document.getElementById("emargement-form").reset();
});
