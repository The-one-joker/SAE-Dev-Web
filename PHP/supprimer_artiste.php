<?php 
    include 'connect.php';

    // Supprimer l'artiste de la table "artistes" en utilisant l'ID récupéré depuis le formulaire
    $sql = "DELETE FROM artistes WHERE ARTISTE_ID =" . $_POST['select'];
    $result = $conn->query($sql);

    // Vérifier si la requête de suppression a réussi
    if ($result === TRUE) {
        echo "Artiste supprimé avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    // Afficher un bouton de retour vers la page de profil de l'administration
    echo "</br><button type='button' class='btn btn-outline-light me-2'><a href='../administration/web_profil.php' style='text-decoration: none; color: inherit;'>Retour</a></button>";

    // Fermer la connexion à la base de données
    $conn->close();
?>