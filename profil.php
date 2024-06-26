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

    // Requête SQL pour sélectionner tous les utilisateurs
    $sql = "SELECT USER_ID, Nom, Prenom, Mail, Mdp, Type FROM Utilisateurs";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Début du tableau HTML
        echo "<h1>Liste des utilisateurs</h1>";
        echo "<table class='table' border='1'>
                <thead>
                    <tr>
                        <th scope='col'>ID</th>
                        <th scope='col'>Nom</th>
                        <th scope='col'>Prénom</th>
                        <th scope='col'>Mail</th>
                        <th scope='col'>Mot de passe</th>
                        <th scope='col'>Type</th>
                    </tr>
                </thead>";
    
        // Parcourir les résultats et ajouter des lignes au tableau
        while($row = $result->fetch_assoc()) {
            echo "
                <tbody>
                <tr>
                    <td>" . $row["USER_ID"] . "</td>
                    <td>" . $row["Nom"] . "</td>
                    <td>" . $row["Prenom"] . "</td>
                    <td>" . $row["Mail"] . "</td>
                    <td>" . $row["Mdp"] . "</td>
                    <td>" . $row["Type"] . "</td>
                </tr>
                </tbody>";
        }
    
        // Fin du tableau HTML
        echo "</table>";
    } else {
        echo "0 résultats";
    }

    // Fermer la connexion
    $conn->close();
?>