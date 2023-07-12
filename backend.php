<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = ""; // Laissez ce champ vide
$password = "Debora08Stephane@";
$dbname = "emargement_db";

// Créer une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
  die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Récupérer les valeurs du formulaire
  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];
  $email = $_POST["email"];

  // Préparer et exécuter la requête d'insertion
  $stmt = $conn->prepare("INSERT INTO emargement (nom, prenom, email) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $nom, $prenom, $email);

  if ($stmt->execute()) {
    echo "Les données d'émargement ont été enregistrées avec succès.";
  } else {
    echo "Erreur lors de l'enregistrement des données : " . $stmt->error;
  }

  // Fermer la requête préparée
  $stmt->close();
}

// Récupérer et afficher les données d'émargement depuis la base de données
$sql = "SELECT * FROM emargement";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<h2>Liste d'émargement :</h2>";
  echo "<ul>";
  while ($row = $result->fetch_assoc()) {
    echo "<li>Nom: " . $row["nom"] . " - Prénom: " . $row["prenom"] . " - Email: " . $row["email"] . "</li>";
  }
  echo "</ul>";
} else {
  echo "Aucune donnée d'émargement trouvée.";
}

// Fermer la connexion à la base de données
$conn->close();
?>
