<?php
include '../PHP/connect.php';



// Requête SQL pour récupérer les 6 albums les plus récents
$sql = "SELECT albums.*, artistes.ARTISTE_Nom, artistes.ARTISTE_Prenom, categorie.Categorie 
        FROM albums
        JOIN artistes ON albums.ARTISTE_ID = artistes.ARTISTE_ID
        JOIN categorie ON albums.Categorie_ID = categorie.Categorie_ID
        ORDER BY albums.Annee_Album DESC
        LIMIT 6";

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
        

         //../albums/playal.php


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
    echo "0 résultats";
}

$conn->close();
?>

