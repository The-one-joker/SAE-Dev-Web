<?php
    include 'connect.php'; // Inclusion du fichier connect.php

    if (!empty($_POST['nom_titre']) && !empty($_POST['annee_sortie']) && !empty($_POST['duree']) && !empty($_POST['select_genre']) && !empty($_POST['select_album']) && !empty($_POST['select_artiste'])) {
        

        $sql = "INSERT INTO titres (Titre, Annee, Duree, Categorie_ID, ALBUM_ID, ARTISTE_ID) VALUES ('".$_POST['nom_titre']."', '".$_POST['annee_sortie']."', '".$_POST['duree']."', '".$_POST['select_genre']."', '".$_POST['select_album']."', '".$_POST['select_artiste']."')";

        if ($conn->query($sql) === TRUE) {
            echo "Nouveau titre ajouté avec succès";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }

    } else {
        echo "Veuillez remplir tous les champs";
    }
    

    

    echo "</br><button type='button'><a href='../administration/web_profil.php' style='text-decoration: none; color: inherit;'>Retour</a></button>";
?>