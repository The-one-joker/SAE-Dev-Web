<?php
    include 'connect.php'; // Inclusion du fichier connect.php

    $sql = "INSERT INTO artistes (ARTISTE_Nom, ARTISTE_Prenom) VALUES ('" . $_POST['nom_artiste'] . "', '" . $_POST['prenom_artiste'] . "')";

    if ($conn->query($sql) === TRUE) {
        echo "Nouvel artiste ajouté avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    echo "</br><button type='button'><a href='../administration/web_profil.php' style='text-decoration: none; color: inherit;'>Retour</a></button>";
?>