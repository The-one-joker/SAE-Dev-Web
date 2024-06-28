<?php
    include 'connect.php'; // Inclure le fichier de connexion à la base de données

    $sql = "SELECT * FROM categorie"; // Requête SQL pour sélectionner toutes les catégories
    $result = $conn->query($sql); // Exécuter la requête et obtenir le résultat

    echo "
        <td>
            <select class='form-select' aria-label='Type compte' name='select_genre'>"; // Début du code HTML pour créer un menu déroulant

    if ($result->num_rows > 0) {
        // Si des catégories sont trouvées dans la base de données
        while($row = $result->fetch_assoc()) {
            // Parcourir les résultats et afficher chaque catégorie dans le menu déroulant
            echo "<option value='" . $row["Categorie_ID"] . "'>" . $row["Categorie"] . "</option>";
        }
    } else {
        // Si aucune catégorie n'est trouvée dans la base de données
        echo '<a class="dropdown-item" href="#">Aucun utilisateur trouvé</a>';
    }
    
    echo "</select></td>"; // Fin du code HTML pour le menu déroulant
    
?>