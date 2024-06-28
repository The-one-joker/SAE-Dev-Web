<?php
    // Configuration de la base de données
    $servername = "localhost"; // Nom du serveur de la base de données
    $username = "root"; // Nom d'utilisateur de la base de données
    $password = "root"; // Mot de passe de la base de données
    $dbname = "Rythmix"; // Nom de la base de données

    // Connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué: " . $conn->connect_error);
    }
?>