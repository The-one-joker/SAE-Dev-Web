
<?php
include '../PHP/connect.php';

// Utilisateur actuellement connecté (exemple avec une session)
$current_user_id = $_COOKIE['ID']; // Exemple, à remplacer par la méthode d'authentification appropriée

// Requête SQL pour récupérer les albums favoris d'un utilisateur
$sql = "SELECT albums.*, artistes.ARTISTE_Nom, artistes.ARTISTE_Prenom, categorie.Categorie 
        FROM favoris
        JOIN albums ON favoris.ALBUM_ID = albums.ALBUM_ID
        JOIN artistes ON albums.ARTISTE_ID = artistes.ARTISTE_ID
        JOIN categorie ON albums.Categorie_ID = categorie.Categorie_ID
        WHERE favoris.USER_ID = $current_user_id";

$result = $conn->query($sql);




 //../albums/playal.php




 
// Vérifier si des résultats ont été trouvés
if ($result->num_rows > 0) {
    // Stocker les résultats dans des variables
    while($row = $result->fetch_assoc()) {
        $album_id = $row["ALBUM_ID"];
        $titre_album = $row["Titre_Album"];
        $annee_album = $row["Annee_Album"];
        $annecdote = $row["Annecdote"];
        $nombre_titres = $row["Nombre_titres"];
        $categorie_id = $row["Categorie_ID"];
        $artiste_id = $row["ARTISTE_ID"];
        $pochette = $row["Pochette"];
        $artiste_nom = $row["ARTISTE_Nom"];
        $artiste_prenom = $row["ARTISTE_Prenom"];
        $categorie = $row["Categorie"];

        echo'<div class="item" data-album-id="$album_id">
                                <img src="../images/avatars/0.png" alt="Playlist Image">
                                <div class="play">
                                    <span class="fa fa-play"></span>
                                </div>
                                <h4>' . htmlspecialchars($titre_album) . '</h4>
                                <a href="/SAE-Dev-Web/albums/playal.php?album_id=' . $album_id . '">' . htmlspecialchars($titre_album) . '</a>
                            </div>';
      
    }
} else {
    echo '<h2> Aucun album en favoris </h2>';
}

$conn->close();
?>