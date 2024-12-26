<?php
// Récupérer les valeurs du formulaire
$etage = $_POST['id_etage'];
$chambre = $_POST['id_chambre'];

// Connexion à la base de données (à personnaliser avec vos informations)
$conn = new mysqli('localhost', 'root', '', 'clinique');

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Préparer la requête d'insertion
$stmt = $conn->prepare("INSERT INTO controle_salle (id_machine, test_fonctionnement, declaration, observation, date, id_etage, id_chambre) VALUES (?, ?, ?, ?, NOW(), ?, ?)");

// Vérifier si la requête est valide
if ($stmt === false) {
    die("Erreur de préparation de la requête : " . $conn->error);
}

// Liage des paramètres
$stmt->bind_param("sssss", $id_machine, $test_fonctionnement_value, $declaration_value, $observation_value, $etage, $chambre);

// Parcourir les données envoyées via le formulaire et exécuter la requête d'insertion
foreach ($_POST['test_fonctionnement'] as $id_machine => $test_fonctionnement_value) {
    $declaration_value = $_POST['declaration'][$id_machine];
    $observation_value = $_POST['observation'][$id_machine];
    $etage = $_POST['id_etage'];
    $chambre = $_POST['id_chambre'];

    // Exécution de la requête pour chaque machine
    $stmt->execute();
}

// Fermer la requête
$stmt->close();

// Redirection vers une page de confirmation ou autre
header("Location: confirmation.php");
exit();
?>
