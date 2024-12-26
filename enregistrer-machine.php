<?php
// Récupérer les valeurs du formulaire
$id_machine = $_POST['id_machine'];
$nom_machine = $_POST['nom_machine'];
$id_etage = $_POST['id_etage'];
$id_chambre = $_POST['id_chambre'];

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinique";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion à la base de données
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Utilisation de requêtes préparées pour éviter les attaques par injection SQL
$stmt = $conn->prepare("INSERT INTO machines (id_machine, nom_machine, id_etage, id_chambre) VALUES (?, ?, ?, ?)");
$stmt->bind_param("issi", $id_machine, $nom_machine, $id_etage, $id_chambre);

if ($stmt->execute()) {
    echo "Enregistrement réussi";
} else {
    echo "Erreur d'enregistrement : " . $stmt->error;
}

// Fermer la connexion à la base de données
$stmt->close();
$conn->close();
?>
