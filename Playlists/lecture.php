<?php
// Inclure le fichier qui contient la connexion à la base de données
include '../PHP/connect.php';

// Récupérer les données de l'album à partir des cookies (exemple)
$album_id = 'album_id'; // À adapter selon la manière dont vous stockez les données

// Requête SQL pour récupérer les titres de l'album
$sql2 = "SELECT TITRE_ID, Titre, Annee, Duree, Categorie_ID, ALBUM_ID, ARTISTE_ID 
        FROM Titres 
        WHERE ALBUM_ID = '$album_id'";

// Exécuter la requête SQL
$result2 = $conn->query($sql2);

// Vérifier s'il y a des résultats
if ($result2->num_rows > 0) {
    // Afficher les titres de l'album
    while ($row = $result2->fetch_assoc()) {
        // Récupérer les données de chaque colonne
        $titre_id = $row["TITRE_ID"];
        $titre_titre = $row["Titre"];
        $titre_annee = $row["Annee"];
        $titre_duree = $row["Duree"];
        $titre_categorie_id = $row["Categorie_ID"];
        $titre_album_id = $row["ALBUM_ID"];
        $titre_artiste_id = $row["ARTISTE_ID"];

        // Afficher chaque titre dans une ligne de tableau HTML
        echo "<tr>";
        echo "<td>" . $titre_id . "</td>";
        echo "<td>" . $titre_titre . "</td>";
        echo "<td>" . $titre_categorie_id . "</td>"; // Utilisez $titre_categorie_id au lieu de $row["categorie"]
        echo "<td>" . $titre_artiste_id . "</td>";   // Utilisez $titre_artiste_id au lieu de $row["artiste"]
        echo "<td>" . $titre_annee . "</td>";        // Utilisez $titre_annee au lieu de $row["annee"]
        echo "<td>" . $titre_duree . "</td>";        // Utilisez $titre_duree au lieu de $row["duree"]
        echo "</tr>";
    }
} else {
    echo "Aucun titre trouvé pour cet album.";
}
?>
