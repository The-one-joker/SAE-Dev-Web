<?php
    include 'connect.php'; // Inclure le fichier de connexion à la base de données

    $sql = "SELECT TITRE_ID, Titre FROM titres"; // Requête SQL pour sélectionner les données des titres
    $result = $conn->query($sql); // Exécuter la requête SQL et stocker le résultat dans une variable

    echo "
        <td>
            <select class='form-select' aria-label='Type compte' name='select_titre'>"; // Afficher le début du code HTML pour le dropdown

    if ($result->num_rows > 0) {
        // Si des résultats sont retournés par la requête
        while($row = $result->fetch_assoc()) {
            // Parcourir les résultats et afficher chaque titre dans le dropdown
            echo "<option value='" . $row["TITRE_ID"] . "'>" . $row["Titre"] . "</option>";
        }
    } else {
        // Si aucun résultat n'est retourné par la requête
        echo '<a class="dropdown-item" href="#">Aucun utilisateur trouvé</a>';
    }
    
    echo "</select></td>"; // Afficher la fin du code HTML pour le dropdown
    
?>