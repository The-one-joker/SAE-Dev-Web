<?php
// Inclure le fichier de connexion à la base de données
include '../PHP/connect.php';

// Utilisateur actuellement connecté (exemple avec une session)
$current_user_id = '1'; // Exemple, à remplacer par la méthode d'authentification appropriée

// Requête SQL pour récupérer les playlists de l'utilisateur pour un album spécifique
$sql = "SELECT Playlist_ID, partage, PLAYLIST_Nom FROM Playlists WHERE partage ='1'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Utilisation correcte de Playlist_ID
        echo '<div class="playlist-item" data-id="' . htmlspecialchars($row['Playlist_ID']) . '">';
        echo htmlspecialchars($row['PLAYLIST_Nom']);
        echo '</div>';
    }
} else {
    echo "Playlists publiques non disponibles.";
}

// Fermer la connexion à la base de données
$conn->close();
?>
