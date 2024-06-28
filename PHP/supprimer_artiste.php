<?php 
    include 'connect.php';

    $sql = "DELETE FROM artistes WHERE ARTISTE_ID =" . $_POST['select'];
    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "Artiste supprimé avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    echo "</br><button type='button' class='btn btn-outline-light me-2'><a href='../administration/web_profil.php' style='text-decoration: none; color: inherit;'>Retour</a></button>";
    $conn->close();
?>