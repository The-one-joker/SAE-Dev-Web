<?php
    // Configuration de la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rythmix";

    // Connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué: " . $conn->connect_error);
    }

    $sql = "SELECT USER_ID, nom, prenom FROM Utilisateurs";
    $result = $conn->query($sql);
    
    echo "<select class='form-select' aria-label='Type compte'>
            <option selected>Utilisateur à supprimer</option>";

    if ($result->num_rows > 0) {
        // Parcourir les résultats et afficher chaque utilisateur dans le dropdown
        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["USER_ID"] . "'>" . $row["nom"] . " " . $row["prenom"] . "</option>";
        }
    } else {
        echo '<a class="dropdown-item" href="#">Aucun utilisateur trouvé</a>';
    }
    
    echo "</select>";
?>
