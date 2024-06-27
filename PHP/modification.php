<?php
    include 'connect.php'; // Inclusion du fichier connect.php

    $sql = "UPDATE Utilisateurs SET Nom = '" . $_POST['nom_modif'] . "', Prenom = '" . $_POST['prenom_modif'] . "', Mail = '" . $_POST['mail_modif'] . "', Mdp = '" . $_POST['mdp_modif'] . "', Type = '" . $_POST['type_modif'] . "' WHERE USER_ID = " . $_POST['id_modif'];

    if ($conn->query($sql) === TRUE) {
        echo "Utilisateur modifié avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    echo "</br><button type='button'><a href='../administration/web_profil.php' style='text-decoration: none; color: inherit;'>Retour</a></button>";
    $conn->close();
?>