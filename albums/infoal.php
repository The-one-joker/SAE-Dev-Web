


<?php
// Inclure le fichier qui contient la connexion à la base de données
include '../PHP/connect.php';

$album_id_to_add = isset($_GET['album_id']) ? $_GET['album_id'] : '';

// Requête SQL pour récupérer les données de l'album
$sql2 = "SELECT 
    titres.TITRE_ID, 
    titres.Titre, 
    titres.Annee, 
    titres.Duree, 
    artistes.ARTISTE_Nom, 
    artistes.ARTISTE_Prenom, 
    categorie.Categorie, 
    albums.Titre_Album,
    (SELECT COUNT(*) FROM titres WHERE titres.ALBUM_ID = albums.ALBUM_ID) AS Nombre_Titres
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

// Vérifier s'il y a des résultats
if ($result2->num_rows > 0) {
    // Récupérer la première ligne de résultats
    $row = $result2->fetch_assoc();

    // Récupérer les données de chaque colonne
    $titre_titre = $row["Titre"];
    $titre_annee = $row["Annee"];
    $titre_duree = $row["Duree"];
    $titre_categorie_id = $row["Categorie"];
    $titre_album_id = $row["Titre_Album"];
    $nom_artiste = $row["ARTISTE_Nom"];
    $prenom_artiste = $row["ARTISTE_Prenom"];
    $nombre_titres = $row["Nombre_Titres"];

    // Afficher les informations dans un bloc HTML
    echo '<div class="title-info">
            <h1 style="color: white;">' . htmlspecialchars($titre_album_id) . '</h1>
            <div class="info">
                <p style="color: white;">' . htmlspecialchars($nom_artiste) . ' ' . htmlspecialchars($prenom_artiste) . '</p>
                <p style="color: white;">Nombre de titres : ' . htmlspecialchars($nombre_titres) . '</p>
            </div>
        </div>';
} 
    
else {
    echo "<p style='color: white;'>Aucun titre trouvé pour cet album.</p>";

}
?>


