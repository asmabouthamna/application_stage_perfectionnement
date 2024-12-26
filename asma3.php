<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement des Salles</title>
</head>
<body>

<?php
// Récupérer les valeurs du formulaire
$etage = $_POST['etage'];
$chambre = $_POST['chambre'];

// Connexion à la base de données (à personnaliser avec vos informations)
$conn = new mysqli('localhost', 'root', '', 'clinique');

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Récupérer la liste des machines dans la chambre et l'étage spécifiés
$query = "SELECT id_etage, id_chambre, id_machine, nom_machine FROM machines WHERE id_etage = $etage AND id_chambre = $chambre";
$result = $conn->query($query);

// Afficher les résultats du contrôle
echo "<h1>Résultats du Contrôle pour Étage $etage et Chambre $chambre</h1>";

// Afficher le formulaire de contrôle des machines
echo '<form action="asma5.php" method="post">';
echo '<div class="control-form">';
echo '<table border="1">';
echo '<tr><th>id_etage</th><th>id_chambre</th><th>id_Machine</th><th>nom_Machine</th><th>Test de Fonctionnement</th><th>Déclaration</th><th>observation</th><th>date</th></tr>';

while ($row = $result->fetch_assoc()) {
    $etage = $row['id_etage'];
    $chambre = $row['id_chambre'];
    $machineId = $row['id_machine'];
    $machineName = $row['nom_machine'];

    // Obtenez la date actuelle au format YYYY-MM-DD
    $currentDate = date("Y-m-d");

    echo "<tr>";
    echo "<td>$etage</td>";
    echo "<td>$chambre</td>";
    echo "<td>$machineId</td>";
    echo "<td>$machineName</td>";
    echo "<td><textarea name='test_fonctionnement[$machineId]' rows='3'></textarea></td>";
    echo "<td><textarea name='declaration[$machineId]' rows='3'></textarea></td>";
    echo "<td class='observationss-td'><label><input type='text' name='observation[$machineId]'></label></td>";
    echo "<td class='date-td'><label><input type='date' name='date[$machineId]' value='$currentDate'></label></td>";
    echo "</tr>";
}

echo '</table>';
echo '<input class="submit-button" type="submit" value="Enregistrer">';
echo '</div>';
echo '</form>';
echo '<form action="ajout-machine.php">';
echo '<input class="submit-button" type="submit" value="ajouter machine">';
echo '</form>';
?>

<style>
    body {
        background-color: beige;
        background-size: cover;
        background-position: center;
        font-family: 'Arial', sans-serif;
        color: #0f0f0f;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        margin-top: 50px;
        font-size: 2.5em;
        text-shadow: 2px 2px 4px rgba(201, 5, 5, 0.5);
    }

    .submit-button {
        display: block;
        margin: 20px auto;
        padding: 15px 20px;
        font-size: 1.2em;
        background-color: #4022ca;
        color:white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .submit-button:hover {
        background-color: #2980b9;
    }
</style>
</body>
</html>




