<?php
// Inclure le fichier qui contient la connexion à la base de données
include '../index.php';

// Récupérer l'ID de la playlist depuis les paramètres GET (exemple)
$playlist_id = isset($_GET['playlist_id']) ? $_GET['playlist_id'] : '';

// Requête SQL pour récupérer les titres de la playlist
$sql = "SELECT t.TITRE_ID, t.Titre, t.Annee, t.Duree, t.Categorie_ID, t.ALBUM_ID, t.ARTISTE_ID 
        FROM Titres t
        JOIN est_dans ed ON t.TITRE_ID = ed.TITRE_ID
        WHERE ed.PLAYLIST_ID = '$playlist_id'";

// Exécuter la requête SQL
$result = $conn->query($sql);

// Vérifier s'il y a des résultats
if ($result->num_rows > 0) {
    // Commencer le tableau HTML
    echo "<table>";
    echo "<tr><th>ID</th><th>Titre</th><th>Categorie ID</th><th>Artiste ID</th><th>Année</th><th>Durée</th></tr>";

    // Afficher les titres de la playlist
    while ($row = $result->fetch_assoc()) {
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
        echo "<td>" . htmlspecialchars($titre_titre) . "</td>";
        echo "<td>" . $titre_categorie_id . "</td>";
        echo "<td>" . $titre_artiste_id . "</td>";
        echo "<td>" . $titre_annee . "</td>";
        echo "<td>" . $titre_duree . "</td>";
        echo "</tr>";
    }

    // Finir le tableau HTML
    echo "</table>";
} else {
    echo "Aucun titre trouvé pour cette playlist.";
}

// Fermer la connexion à la base de données
$conn->close();
?>
