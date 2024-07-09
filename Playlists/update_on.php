<?php
include '../PHP/connect.php';

$playlist_id = $_GET['playlist_id'];

// Requête SQL pour mettre à jour le champ Partage à 0
$sql = "UPDATE playlists SET Partage = 0 WHERE PLAYLIST_ID = $playlist_id";

// Exécution de la requête
if ($conn->query($sql) === TRUE) {
    // Redirection vers la page de playlists avec l'ID de la playlist
    header("Location: ../Playlists/playal.php?album_id=$playlist_id");
    exit;
} else {
    // En cas d'erreur lors de l'exécution de la requête
    echo "Erreur lors de la mise à jour : " . $conn->error;
}
?>