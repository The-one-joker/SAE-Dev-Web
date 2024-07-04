<?php

include '../PHP/connect.php';

// Utilisateur actuellement connecté (exemple avec une session)
$current_user_id = $_COOKIE['ID']; // Exemple, à remplacer par la méthode d'authentification appropriée

// ID de l'album à ajouter en favoris (à obtenir de la requête HTTP ou autre source)
$album_id_to_add = $playlist_id = isset($_GET['album_id']) ? $_GET['album_id'] : '';

// Vérifier si l'album est déjà dans les favoris de l'utilisateur
$sql_check = "SELECT * FROM favoris WHERE ALBUM_ID = $album_id_to_add AND USER_ID = $current_user_id";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    echo "<script>alert('Cet album est déjà dans vos favoris 😄'); window.location.href = '../albums/affal.php';</script>";
} else {
    // Requête SQL pour ajouter l'album en favoris
    $sql_insert = "INSERT INTO favoris (ALBUM_ID, USER_ID) VALUES ($album_id_to_add, $current_user_id)";

    if ($conn->query($sql_insert) === TRUE) {
        echo "<script>alert('Album ajouté aux favoris avec succès ❤️'); window.location.href = '../albums/affal.php';</script>";
    } else {
        echo "Erreur: " . $sql_insert . "<br>" . $conn->error;
    }
}

$conn->close();
?>