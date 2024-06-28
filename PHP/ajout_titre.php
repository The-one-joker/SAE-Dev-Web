<?php
    include 'connect.php'; // Inclusion du fichier connect.php

    if (!empty($_POST['nom_titre']) && !empty($_POST['annee_sortie']) && !empty($_POST['duree']) && !empty($_POST['select_genre']) && !empty($_POST['select_album']) && !empty($_POST['select_artiste'])) {
        // Vérifie si tous les champs du formulaire sont remplis

        $sql = "INSERT INTO titres (Titre, Annee, Duree, Categorie_ID, ALBUM_ID, ARTISTE_ID) VALUES ('".$_POST['nom_titre']."', '".$_POST['annee_sortie']."', '".$_POST['duree']."', '".$_POST['select_genre']."', '".$_POST['select_album']."', '".$_POST['select_artiste']."')";
        // Requête SQL pour insérer les données dans la table "titres"

        if ($conn->query($sql) === TRUE) {
            echo "Nouveau titre ajouté avec succès";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
        // Exécute la requête SQL et affiche un message de succès ou d'erreur

    } else {
        echo "Veuillez remplir tous les champs";
    }
    // Si tous les champs ne sont pas remplis, affiche un message d'erreur

    echo "</br><button type='button'><a href='../administration/web_profil.php' style='text-decoration: none; color: inherit;'>Retour</a></button>";
    // Affiche un bouton de retour vers la page web_profil.php
?>