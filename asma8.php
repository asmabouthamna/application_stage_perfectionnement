<?php
// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['test_fonctionnement'])) {
    // Connectez-vous à la base de données
    $conn = new mysqli('localhost', 'root', '', 'clinique');

    // Vérifiez la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Parcourez les données postées
    foreach ($_POST['test_fonctionnement'] as $id_etage => $test_fonctionnement) {
        $date = $_POST['date'][$id_etage];

        // Échappez les valeurs pour éviter les injections SQL
        $id_etage = $conn->real_escape_string($id_etage);
        $test_fonctionnement = $conn->real_escape_string($test_fonctionnement);
        $date = $conn->real_escape_string($date);

        // Obtenez le numéro d'étage à partir de la base de données
        $query_etage = "SELECT num_etage FROM etages WHERE id_etage = '$id_etage'";
        $result_etage = $conn->query($query_etage);

        if ($result_etage && $row_etage = $result_etage->fetch_assoc()) {
            $num_etage = $row_etage['num_etage'];

            // Insérez les données dans la table controle_etage
            $query_insert = "INSERT INTO controle_etage (id_etage, num_etage, etat, date) VALUES ('$id_etage', '$num_etage', '$test_fonctionnement', '$date')";

            if ($conn->query($query_insert) === TRUE) {
                echo "Enregistrement réussi pour les etages <br>";
            } else {
                echo "Erreur lors de l'enregistrement : " . $conn->error . "<br>";
            }
        } else {
            echo "Erreur lors de la récupération du numéro d'étage<br>";
        }
    }

    // Fermez la connexion à la base de données
    $conn->close();
}
?>
