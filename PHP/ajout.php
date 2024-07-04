<?php
    include 'connect.php'; // Inclusion du fichier connect.php

    if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['mdp']) AND !empty($_POST['type'])) { // Vérifie si les champs ne sont pas vides
        $password_hash = password_hash($_POST['mdp'], PASSWORD_DEFAULT); // Hash du mot de passe
        $sql = "INSERT INTO Utilisateurs (Nom, Prenom, Mail, Mdp, Type) VALUES ('" . $_POST['nom'] . "', '" . $_POST['prenom'] . "', '" . $_POST['mail'] . "', '" . $password_hash . "', '" . $_POST['type'] . "')";

        if ($conn->query($sql) === TRUE) { // Vérifie si la requête d'insertion a réussi
            
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error; // Affiche l'erreur en cas d'échec de la requête
        }

    } else {
        echo "Veuillez remplir tous les champs"; // Affiche un message d'erreur
    }
    
echo "</br><button type='button'><a href='../administration/web_profil.php' style='text-decoration: none; color: inherit;'>Retour</a></button>"; // Affiche un bouton de retour
?>