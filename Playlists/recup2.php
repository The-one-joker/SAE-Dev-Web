<?php
// Inclure le fichier qui contient la connexion à la base de données
include '../PHP/connect.php';

// Récupérer les données de l'album à partir des cookies 
$album_id_to_add = $playlist_id = isset($_GET['album_id']) ? $_GET['album_id'] : '';


// Requête SQL pour récupérer les titres de l'album
$sql2 = "SELECT 
            titres.TITRE_ID,
            titres.Titre AS Titre,
            titres.Annee AS Annee,
            titres.Duree AS Duree,
            categorie.Categorie AS Categorie,
            albums.Titre_Album AS Titre_Album,
            artistes.ARTISTE_Nom AS ARTISTE_Nom,
            artistes.ARTISTE_Prenom AS ARTISTE_Prenom,
            (SELECT COUNT(*) FROM contient WHERE contient.PLAYLIST_ID = $album_id_to_add) AS Nombre_Titres
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
        WHERE 
            contient.PLAYLIST_ID = $album_id_to_add";


// Exécuter la requête SQL
$result2 = $conn->query($sql2);
$iter = 1;
// Vérifier s'il y a des résultats
if ($result2->num_rows > 0) {
    // Afficher les titres de l'album
    while ($row = $result2->fetch_assoc()) {

        // Récupérer les données de chaque colonne
        $titre_id = $row["TITRE_ID"];
        $titre_titre = $row["Titre"];
        $titre_annee = $row["Annee"];
        $titre_duree = $row["Duree"];
        $titre_categorie_id = $row["Categorie"];
        $titre_album_id = $row["Titre_Album"];
        $nom_artiste = $row["ARTISTE_Prenom"];
        $titre_artiste_id = $row["ARTISTE_Nom"];

        // Afficher chaque titre dans une ligne de tableau HTML
    echo "<tr>";
    echo "<td>" . $iter . "</td>";
    echo "<td>" . $titre_titre . "</td>";
    echo "<td>" . $titre_album_id . "</td>";
    echo "<td>" . $titre_categorie_id . "</td>";
    echo "<td>" . $nom_artiste . " " . $titre_artiste_id . "</td>";
    echo "<td>" . $titre_annee . "</td>";
    echo "<td>" . $titre_duree . "</td>";
    echo "<td> <a href='sup.php?album_id=" . $album_id_to_add . "&titre_id=" . $titre_id . "'>
                    <button class='delete-btn'>
                        <i class='fas fa-trash-alt'></i>
                    </button>
                </a></td>";
    echo "</tr>";
    $iter = $iter + 1;
    }
} else {
    echo "<p style='color: white;'>Aucun titre trouvé pour cet album.</p>";

}
?>
