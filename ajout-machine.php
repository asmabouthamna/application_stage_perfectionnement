<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Machine</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Ajouter une Machine</h1>
      <!-- ... Autres champs du formulaire ... -->
<form action="enregistrer-machine.php" method="post">
    <label for="id_machine">ID de la machine :</label>
    <input type="text" name="id_machine" id="id_machine" required>

    <label for="nom_machine">nom de la machine :</label>
    <input type="text" name="nom_machine" id="nom_machine" required>
    
        

        <label for="id_chambre">id_chambre :</label>
        <input type="int" id="id_chambre" name="id_chambre" required>
        
        <label for="id_etage">id_etage :</label>
        <input type="int" id="id_etage" name="id_etage" required>

        <input type="submit" value="Enregistrer">
        </form>
        
    </div>
</body>
</html>

