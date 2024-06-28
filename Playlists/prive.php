<?php



include '../PHP/connect.php';

// Utilisateur actuellement connecté (exemple avec une session)
$current_user_id = $_COOKIE['ID']; // Exemple, à remplacer par la méthode d'authentification appropriée

// Requête SQL pour récupérer les playlists de l'utilisateur pour un album spécifique
$sql = "SELECT playlists.PLAYLIST_ID, playlists.PLAYLIST_Nom FROM utilisateurs
        JOIN a_cree ON a_cree.USER_ID = utilisateurs.USER_ID
        JOIN playlists ON playlists.PLAYLIST_ID = a_cree.PLAYLIST_ID
        WHERE utilisateurs.USER_ID = $current_user_id"; // Ajout d'une condition pour filtrer par utilisateur

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Affichage du nom de la playlist avec l'ID dans l'attribut data
        echo '<div class="playlist-item" data-playlist-id="' . $row['PLAYLIST_ID'] . '">
        <a href="/SAE-Dev-Web/Playlists/playform.php?playlist_id=' . $row['PLAYLIST_ID'] . '">' . htmlspecialchars($row['PLAYLIST_Nom']) . '</a>
    </div>';;
    }
} else {
    echo "Aucune Playlist pour le moment";
}

// Fermer la connexion à la base de données
$conn->close();
?>

