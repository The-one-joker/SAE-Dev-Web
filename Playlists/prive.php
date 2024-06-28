

<?php
// Inclure le fichier de connexion à la base de données
include '../index.php';

// Utilisateur actuellement connecté (exemple avec une session)
$current_user_id = '1'; // Exemple, à remplacer par la méthode d'authentification appropriée

// Requête SQL pour récupérer les playlists de l'utilisateur pour un album spécifique
$sql = "SELECT nom, prenom, PLAYLIST_Nom FROM utilisateurs
JOIN a_cree ON a_cree.USER_ID = utilisateurs.USER_ID
JOIN playlists ON playlists.PLAYLIST_ID = a_cree.PLAYLIST_ID"; // Suppression du point-virgule dans la chaîne

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="playlist-item">' . htmlspecialchars($row['PLAYLIST_Nom']) . '</div>';
    }
} else {
    echo "Aucune Playlist pour le moment";
}

// Fermer la connexion à la base de données
$conn->close();
?>

