<?php 
    include 'connect.php';

    // Supprimer le titre correspondant à l'ID envoyé via la méthode POST
    $sql = "DELETE FROM titres WHERE TITRE_ID =" . $_POST['select_titre'];
    $result = $conn->query($sql);

    // Vérifier si la suppression a réussi
    if ($result === TRUE) {
        echo "Titre supprimé avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    // Afficher un bouton de retour vers la page de profil
    echo "</br><button type='button' class='btn btn-outline-light me-2'><a href='../administration/web_profil.php' style='text-decoration: none; color: inherit;'>Retour</a></button>";

    // Fermer la connexion à la base de données
    $conn->close();
?>