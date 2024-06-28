<?php
    include 'connect.php'; // Inclure le fichier de connexion à la base de données

    $sql = "SELECT USER_ID, nom, prenom FROM Utilisateurs"; // Requête SQL pour sélectionner les utilisateurs
    $result = $conn->query($sql); // Exécuter la requête et stocker le résultat dans une variable

    // Formulaire pour supprimer un utilisateur
    echo "
    <form method='post' action='../PHP/supprimer.php'> 
    <table>
        <thead>
            <tr>
                <td>
                    <select class='form-select' aria-label='Type compte' name='select'>
                    <option selected>Utilisateur à supprimer</option>"; // Option par défaut dans le dropdown

    if ($result->num_rows > 0) {
        // Parcourir les résultats et afficher chaque utilisateur dans le dropdown
        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["USER_ID"] . "'>" . $row["nom"] . " " . $row["prenom"] . "</option>";
        }
    } else {
        echo '<a class="dropdown-item" href="#">Aucun utilisateur trouvé</a>'; // Message affiché si aucun utilisateur n'est trouvé
    }
    
    echo "</select></td>
        <td><button type='submit' class='btn btn-primary'>Supprimer</button></td>
        </tr></thead></table></form>"; // Bouton de soumission pour supprimer l'utilisateur
        
?>
