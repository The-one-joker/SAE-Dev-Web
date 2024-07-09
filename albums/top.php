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
        


        
        echo '<div class="item" data-album-id="' . $album_id . '">
        
                                        <div class="pochette">
                                        <img src="../images/pochettes/' . htmlspecialchars($pochette) . '" alt="Playlist Image">
                                        </div>
        
                                        <div class="play">
                                        <a href="../albums/playal.php?album_id=' . $album_id . '" style="text-decoration: none;"><span class="fa fa-play"></span></a>
                                        </div>
        
                                        <div class="title">
                                            <h3>' . htmlspecialchars($titre_album) . '</h3>
                                            <h4>' . htmlspecialchars($artiste_nom) . ' ' . htmlspecialchars($artiste_prenom) . '</h4>
                                        </div> 
        
                                        <div class="img2">
                                            <a href="../albums/ajoutfav.php?album_id=' . $album_id . '"> <img class="like" src="../images/icons/liki.svg"> </a>
                                        </div>
                                        
                                    </div>';
    }
} else {
    echo "0 résultats";
}

$conn->close();
?>

