<?php 
    include 'connect.php'; // Inclut le fichier de connexion à la base de données

    $sql = "DELETE FROM albums WHERE ALBUM_ID =" . $_POST['select_album']; // Requête SQL pour supprimer l'album sélectionné
    $result = $conn->query($sql); // Exécute la requête

    if ($result === TRUE) { // Vérifie si la requête a réussi
        echo "Album et titres associés supprimés avec succès"; // Affiche un message de succès si la suppression a réussi
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error; // Affiche un message d'erreur avec les détails de l'erreur en cas d'échec de la suppression
    }

    echo "</br><button type='button' class='btn btn-outline-light me-2'><a href='../administration/web_profil.php' style='text-decoration: none; color: inherit;'>Retour</a></button>"; // Affiche un bouton de retour à la page précédente
    $conn->close(); // Ferme la connexion à la base de données
?>