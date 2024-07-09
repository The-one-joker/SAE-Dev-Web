


<?php
// Inclure le fichier qui contient la connexion à la base de données
include '../PHP/connect.php';

$playlist_id = $album_id_to_add = isset($_GET['album_id']) ? $_GET['album_id'] : '';

$sql = "SELECT 
            titres.TITRE_ID,
            titres.Titre AS Titre,
            titres.Annee AS Annee,
            titres.Duree AS Duree,
            categorie.Categorie AS Categorie,
            albums.Titre_Album AS Titre_Album,
            artistes.ARTISTE_Nom AS ARTISTE_Nom,
            artistes.ARTISTE_Prenom AS ARTISTE_Prenom,
            playlists.PLAYLIST_Nom AS Nom_Playlist,
            (SELECT COUNT(*) FROM contient WHERE contient.PLAYLIST_ID = $playlist_id) AS Nombre_Titres
        FROM 
            contient
        JOIN 
            titres ON contient.TITRE_ID = titres.TITRE_ID
        JOIN 
            artistes ON titres.ARTISTE_ID = artistes.ARTISTE_ID
        JOIN 
            categorie ON titres.Categorie_ID = categorie.Categorie_ID
        JOIN 
            albums ON titres.ALBUM_ID = albums.ALBUM_ID
        JOIN 
            playlists ON contient.PLAYLIST_ID = playlists.PLAYLIST_ID
        WHERE 
            contient.PLAYLIST_ID = $playlist_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); 
        $titre_titre = $row["Titre"];
        $titre_annee = $row["Annee"];
        $titre_duree = $row["Duree"];
        $titre_categorie = $row["Categorie"];
        $titre_album = $row["Titre_Album"];
        $nom_artiste = $row["ARTISTE_Nom"];
        $prenom_artiste = $row["ARTISTE_Prenom"];
        $nombre_titres = $row["Nombre_Titres"];
        $nomplay = $row["Nom_Playlist"];

    // Afficher les informations dans un bloc HTML
    echo '<div class="title-info">
            <h1 style="color: white;">' . htmlspecialchars($titre_album) . '</h1>
            <div class="info">
                <p style="color: white;">Titre : ' . htmlspecialchars($nomplay) . '</p>
                <p style="color: white;">Nombre de titres : ' . htmlspecialchars($nombre_titres) . '</p>
            </div>
        </div>';
    }
    
else {
    echo "<p style='color: white;'>Aucun titre trouvé pour cet album.</p>";

}
?>


