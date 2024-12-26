<!-- controle_salles.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrôle des Salles</title>
    
</head>
<body>

    <h1>Contrôle des Salles</h1>

    <form action="asma3.php" method="post">
        <label for="etage">ID Étage :</label>
        <input type="text" id="etage" name="etage" required>

        <label for="chambre">ID Chambre :</label>
        <input type="text" id="chambre" name="chambre" required>

        <button type="submit">Contrôler</button>
    </form>

 <style>
    body {
        background-image: url('biom3.jpg'); /* Remplacez 'background.jpg' par le chemin de votre image */
            background-size: cover;
            background-position: center;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
}

h1 {
    text-align: center;
    color: #333;
}

form {
    max-width: 500px;
    margin: 80px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #333;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    display: block;
    width: 100%;
    padding: 12px;
    background-color: #16a32d;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #29b948;
}
</style>

</body>
</html>
