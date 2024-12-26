<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrôles d'Étages</title>
    <link rel="stylesheet" href="styles.css"> <!-- Assurez-vous d'avoir une feuille de style CSS -->
</head>
<body>

    <h1>Contrôles d'Étages</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Numéro d'Étage</th>
            <th>Test de Fonctionnement</th>
            <th>Mois/annee</th>
        </tr>

        <?php
        // Connectez-vous à la base de données
        $conn = new mysqli('localhost', 'root', '', 'clinique');

        // Vérifiez la connexion
        if ($conn->connect_error) {
            die("Erreur de connexion à la base de données : " . $conn->connect_error);
        }

        // Récupérez les données depuis la base de données
        $query = "SELECT id_etage ,num_etage FROM etages";
        $result = $conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $id_etage = $row['id_etage'];
            $num_etage = $row['num_etage'];

            // Obtenez la date actuelle au format YYYY-MM-DD
            $currentDate = date("m-y");

            echo "<tr>";
            echo "<td>$id_etage</td>";
            echo "<td>$num_etage</td>";
            echo "<td><input type='text' name='test_fonctionnement[$id_etage]' rows='3'></td>";
            echo "<td class='date-td'><label><input  name='date[$id_etage]' value='$currentDate'></label></td>";
            echo "</tr>";
        }

        // Fermez la connexion à la base de données
        $conn->close();
        ?>

    </table>

    <form action="asma8.php" method="post">
        <input class="submit-button" type="submit" value="Enregistrer">
    </form>

<style>
    body {
        font-family: 'Arial', sans-serif;
    }

    h1 {
        text-align: center;
    }

    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    .submit-button {
        display: block;
        margin: 5px auto;
        padding: 5px 20px; /* Ajustez la largeur du bouton ici */
        font-size: 1.2em;
        background-color: #4022ca;
        color: white;
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


