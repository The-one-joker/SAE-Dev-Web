<?php
    include 'connect.php'; // Inclusion du fichier connect.php

    $sql = "INSERT INTO artistes (ARTISTE_Nom, ARTISTE_Prenom) VALUES ('" . $_POST['nom_artiste'] . "', '" . $_POST['prenom_artiste'] . "')";

    if ($conn->query($sql) === TRUE) { // Vérifie si la requête d'insertion a réussi
        echo "Nouvel artiste ajouté avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error; // Affiche l'erreur en cas d'échec de la requête
    }

    echo "</br><button type='button'><a href='../administration/web_profil.php' style='text-decoration: none; color: inherit;'>Retour</a></button>"; // Affiche un bouton de retour
?>