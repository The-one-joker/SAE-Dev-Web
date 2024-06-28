<?php
// Inclure le fichier de connexion à la base de données
include '../index.php';

// Utilisateur actuellement connecté (exemple avec une session)
$current_user_id = '1'; // Exemple, à remplacer par la méthode d'authentification appropriée

// Requête SQL pour récupérer les playlists de l'utilisateur pour un album spécifique
$sql = "SELECT partage, PLAYLIST_Nom FROM Playlists WHERE partage ='1' "; // Suppression du point-virgule dans la chaîne

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="playlist-item" > <a href="/Playlists/playform.php"> ' . htmlspecialchars($row['PLAYLIST_Nom']) . ' </a> </div>';
    }
} else {
    echo "Playlist Publiques non dispo";
}

// Fermer la connexion à la base de données
$conn->close();
?>
