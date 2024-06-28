<?php 
    include 'connect.php';

    // Supprime l'utilisateur avec l'ID spécifié dans la variable $_POST['select']
    $sql = "DELETE FROM Utilisateurs WHERE USER_ID =" . $_POST['select'];
    $result = $conn->query($sql);

    // Vérifie si la suppression a réussi
    if ($result === TRUE) {
        echo "Utilisateur supprimé avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    // Affiche un bouton de retour vers la page de profil
    echo "</br><button type='button' class='btn btn-outline-light me-2'><a href='../administration/web_profil.php' style='text-decoration: none; color: inherit;'>Retour</a></button>";

    // Ferme la connexion à la base de données
    $conn->close();
?>