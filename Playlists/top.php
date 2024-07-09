<?php
include '../PHP/connect.php';


$sql = "SELECT playlists.*, Utilisateurs.Nom, Utilisateurs.Prenom
FROM playlists
JOIN Utilisateurs ON playlists.PLAYLIST_ID = Utilisateurs.USER_ID
WHERE partage = 1
LIMIT 5";


        
$result = $conn->query($sql);

// Vérifier si des résultats ont été trouvés
if ($result->num_rows > 0) {
    // Stocker les résultats dans des variables
    while($row = $result->fetch_assoc()) {
        $playlist_id = $row["PLAYLIST_ID"];
        $titre_playlist = $row["PLAYLIST_Nom"];
        $image = $row["Pochette_play"];
        $nom = $row["Nom"];
        $prenom = $row["Prenom"];


        
        echo '<div class="item" data-album-id="' . htmlspecialchars($playlist_id) . '">
                <div class="pochette">
                    <img src="../images/pochettes_playlists/' . htmlspecialchars($image) . '" alt="Playlist Image">
                </div>
                <div class="play">
                    <a href="../Playlists/playal.php?album_id=' . htmlspecialchars($playlist_id) . '" style="text-decoration: none;"><span class="fa fa-play"></span></a>
                </div>
                <div class="title">
                    <h3>' . htmlspecialchars($titre_playlist) . '</h3>
                    <h4> <p  style="font-size: 10px;">Créé par : </p>' . htmlspecialchars($prenom) . ' ' . htmlspecialchars($nom) . '</h4>
                </div> 
            </div>';
        }
} else {
    echo "0 résultats";
}

$conn->close();

?>