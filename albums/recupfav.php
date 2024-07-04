
<?php
include '../PHP/connect.php';

// Utilisateur actuellement connecté 
$current_user_id = $_COOKIE['ID']; 

// Requête SQL pour récupérer les albums favoris d'un utilisateur
$sql = "SELECT albums.*, artistes.ARTISTE_Nom, artistes.ARTISTE_Prenom, categorie.Categorie 
        FROM favoris
        JOIN albums ON favoris.ALBUM_ID = albums.ALBUM_ID
        JOIN artistes ON albums.ARTISTE_ID = artistes.ARTISTE_ID
        JOIN categorie ON albums.Categorie_ID = categorie.Categorie_ID
        WHERE favoris.USER_ID = $current_user_id";

$result = $conn->query($sql);
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

                                <div class="pochette">
                                        <img src="../images/pochettes/' . htmlspecialchars($pochette) . '" alt="Playlist Image">
                                        </div>

                                <div class="play">
                                <a href="/SAE-Dev-Web/albums/playal.php?album_id=' . $album_id . '"><span class="fa fa-play"></span></a> <span class="fa fa-play"></span>
                                </div>

                                <div class="title">
                                    <h4>' . htmlspecialchars($titre_album) . '</h4>
                                    <h4>' . htmlspecialchars($artiste_nom) . ' ' . htmlspecialchars($artiste_prenom) . '</h4>
                                </div> 

                                <div class="img2">
                                    <a href="/SAE-Dev-Web/albums/supfav.php?album_id=' . $album_id . '"> <img class="like" src="../images/icons/aliki.svg"> </a>
                                </div>
                                
                            </div>';
    }
} else {
    echo '<h2> Aucun album en favoris </h2>';
}

$conn->close();
?>