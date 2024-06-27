<?php 
    include 'connect.php';

    $sql = "DELETE FROM Utilisateurs WHERE USER_ID =" . $_POST['select'];
    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "Utilisateur supprimé avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    echo "</br><button type='button' class='btn btn-outline-light me-2'><a href='../administration/web_profil.php' style='text-decoration: none; color: inherit;'>Retour</a></button>";
    $conn->close();
?>