<?php
    include 'connect.php'; // Inclure le fichier de connexion à la base de données

    $sql = "SELECT * FROM artistes"; // Requête SQL pour sélectionner tous les artistes
    $result = $conn->query($sql); // Exécuter la requête et stocker le résultat dans une variable

    echo "
        <td>
            <select class='form-select' aria-label='Type compte' name='select_artiste'>"; // Afficher le début du code HTML pour le dropdown

    if ($result->num_rows > 0) {
        // Si des artistes sont trouvés dans la base de données
        while($row = $result->fetch_assoc()) {
            // Parcourir les résultats et afficher chaque artiste dans le dropdown
            echo "<option value='" . $row["ARTISTE_ID"] . "'>" . $row["ARTISTE_Nom"] . " " . $row["ARTISTE_Prenom"] . "</option>";
        }
    } else {
        // Si aucun artiste n'est trouvé dans la base de données
        echo '<a class="dropdown-item" href="#">Aucun utilisateur trouvé</a>';
    }
    
    echo "</select></td>"; // Afficher la fin du code HTML pour le dropdown
    
?>
