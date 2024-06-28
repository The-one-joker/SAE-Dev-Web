<?php
// Inclure le fichier de connexion à la base de données
include '../PHP/connect.php';

// Utilisateur actuellement connecté (exemple avec une session)
$current_user_id = '1'; // Exemple, à remplacer par la méthode d'authentification appropriée

// Requête SQL pour récupérer les playlists partagées
$sql = "SELECT PLAYLIST_ID, partage, PLAYLIST_Nom FROM Playlists WHERE partage = '1'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Affichage du nom de la playlist avec l'ID dans l'attribut data et le lien vers la page
        echo '<div class="playlist-item" data-playlist-id="' . $row['PLAYLIST_ID'] . '">
                <a href="playform.php?playlist_id=' . $row['PLAYLIST_ID'] . '">' . htmlspecialchars($row['PLAYLIST_Nom']) . '</a>
            </div>';
    }
} else {
    echo "Playlists publiques non disponibles";
}

// Fermer la connexion à la base de données
$conn->close();
?>
