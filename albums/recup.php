<?php
// Inclure le fichier qui contient la connexion à la base de données
include '../PHP/connect.php';

// Récupérer les données de l'album à partir des cookies 
$album_id_to_add = $playlist_id = isset($_GET['album_id']) ? $_GET['album_id'] : '';


// Requête SQL pour récupérer les titres de l'album
$sql2 = "SELECT 
titres.TITRE_ID, 
titres.Titre, 
titres.Annee, 
titres.Duree, 
artistes.ARTISTE_Nom, 
artistes.ARTISTE_Prenom, 
categorie.Categorie, 
albums.Titre_Album
FROM 
titres 
JOIN 
categorie ON titres.Categorie_ID = categorie.Categorie_ID
JOIN 
artistes ON titres.ARTISTE_ID = artistes.ARTISTE_ID
JOIN 
albums ON titres.ALBUM_ID = albums.ALBUM_ID
WHERE 
albums.ALBUM_ID = $album_id_to_add";


// Exécuter la requête SQL
$result2 = $conn->query($sql2);
$iter = 1;
// Vérifier s'il y a des résultats
if ($result2->num_rows > 0) {
    // Afficher les titres de l'album
    while ($row = $result2->fetch_assoc()) {

        // Récupérer les données de chaque colonne
        $titre_titre = $row["Titre"];
        $titre_annee = $row["Annee"];
        $titre_duree = $row["Duree"];
        $titre_id = $row["TITRE_ID"];
        $titre_categorie_id = $row["Categorie"];
        $titre_album_id = $row["Titre_Album"];
        $nom_artiste = $row["ARTISTE_Prenom"];
        $titre_artiste_id = $row["ARTISTE_Nom"];

        // Afficher chaque titre dans une ligne de tableau HTML
        echo "<tr>";
        echo "<td>" . ($iter) . "</td>";
        echo "<td>" . $titre_id . "</td>";
        echo "<td>" . $titre_titre . "</td>";
        echo "<td>" . $titre_categorie_id . "</td>"; 
        echo "<td>" . $nom_artiste . " " . $titre_artiste_id . "</td>";   
        echo "<td>" . $titre_annee . "</td>";       
        echo "<td>" . $titre_duree . "</td>";        
        echo "</tr>";
        $iter = $iter + 1;
    }
} else {
    echo "<p style='color: white;'>Aucun titre trouvé pour cet album.</p>";

}
?>
