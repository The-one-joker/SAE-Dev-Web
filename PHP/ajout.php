<?php
    include 'connect.php'; // Inclusion du fichier connect.php

    $sql = "INSERT INTO Utilisateurs (Nom, Prenom, Mail, Mdp, Type) VALUES ('" . $_POST['nom'] . "', '" . $_POST['prenom'] . "', '" . $_POST['mail'] . "', '" . $_POST['mdp'] . "', '" . $_POST['type'] . "')";

    if ($conn->query($sql) === TRUE) {
        echo "Nouvel utilisateur ajouté avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    echo "</br><button type='button'><a href='../administration/web_profil.php' style='text-decoration: none; color: inherit;'>Retour</a></button>";
?>