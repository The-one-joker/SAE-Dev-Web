<?php

include '../PHP/connect.php';

// Utilisateur actuellement connecté (exemple avec une session)
$current_user_id = $_COOKIE['ID']; // Exemple, à remplacer par la méthode d'authentification appropriée

// ID de l'album à ajouter en favoris (à obtenir de la requête HTTP ou autre source)
$album_id_to_supp = $playlist_id = isset($_GET['album_id']) ? $_GET['album_id'] : '';

// Vérifier si l'album est déjà dans les favoris de l'utilisateur
$sql_check = "SELECT * FROM favoris WHERE ALBUM_ID = $album_id_to_supp AND USER_ID = $current_user_id";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    // Requête SQL pour supprimer l'album des favoris
    $sql_delete = "DELETE FROM favoris WHERE ALBUM_ID = $album_id_to_supp AND USER_ID = $current_user_id";

    if ($conn->query($sql_delete) === TRUE) {
        echo "<script>alert('Cet album a été supprimé de vos favoris'); window.location.href = '../albums/affal.php';</script>";
    } else {
        echo "scipt>alert('Erreur: " . $sql_delete . "<br>" . $conn->error . "'); window.location.href = '../albums/affal.php';</script>";
    }
} else {
    echo "<script>alert('Cet album n'est pas dans vos favoris'); window.location.href = '../albums/affal.php';</script>";
}

$conn->close();
?>