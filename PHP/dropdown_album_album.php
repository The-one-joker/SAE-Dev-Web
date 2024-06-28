<?php
    include 'connect.php'; // Inclure le fichier de connexion à la base de données

    $sql = "SELECT ALBUM_ID, Titre_Album FROM albums"; // Requête SQL pour sélectionner les colonnes ALBUM_ID et Titre_Album de la table albums
    $result = $conn->query($sql); // Exécuter la requête et stocker le résultat dans la variable $result
    
    echo "
        <td>
            <select class='form-select' aria-label='Type compte' name='select_album'>"; // Afficher le début du code HTML pour créer un menu déroulant

    if ($result->num_rows > 0) {
        // Si des résultats sont retournés par la requête
        while($row = $result->fetch_assoc()) {
            // Parcourir les résultats et afficher chaque option dans le menu déroulant
            echo "<option value='" . $row["ALBUM_ID"] . "'>" . $row["Titre_Album"] . "</option>";
        }
    } else {
        // Si aucun résultat n'est retourné par la requête
        echo '<a class="dropdown-item" href="#">Aucun utilisateur trouvé</a>'; // Afficher un message indiquant qu'aucun utilisateur n'a été trouvé
    }
    
    echo "</select></td>"; // Fermer le code HTML pour le menu déroulant
    
?>