<?php



// Création de la connexion
include '../index.php';

// Utilisateur actuellement connecté (exemple avec une session)
$current_user_id = '1';

// Requête SQL pour récupérer les albums favoris de l'utilisateur
$sql = "SELECT Albums.ALBUM_ID, Albums.Titre_Album, Albums.Annee_Album, 
        Albums.Anectdote, Albums.Nombre_titres, Albums.Categorie_ID,
        Categorie.Categorie, Albums.ARTISTE_ID, Artistes.ARTISTE_Nom, 
        Artistes.ARTISTE_Prenom 
        FROM Favoris 
        JOIN Albums ON Favoris.ALBUM_ID = Albums.ALBUM_ID 
        JOIN Categorie ON Albums.Categorie_ID = Categorie.Categorie_ID 
        JOIN Artistes ON Albums.ARTISTE_ID = Artistes.ARTISTE_ID
        WHERE Favoris.USER_ID = '$current_user_id'";

// Exécuter la requête SQL
$result = $conn->query($sql);

// Vérifier s'il y a des résultats
if ($result->num_rows > 0) {
    // Parcourir chaque ligne de résultat
    while ($row = $result->fetch_assoc()) {
        // Extraire les valeurs dans des variables
        $album_id = $row["ALBUM_ID"];
        $titre_album = $row["Titre_Album"];
        $annee_album = $row["Annee_Album"];
        $anecdote = $row["Anectdote"];
        $nombre_titres = $row["Nombre_titres"];
        $categorie_id = $row["Categorie_ID"];
        $categorie = $row["Categorie"];
        $artiste_id = $row["ARTISTE_ID"];
        $artiste_nom = $row["ARTISTE_Nom"];
        $artiste_prenom = $row["ARTISTE_Prenom"];

        // Définition des cookies pour chaque variable
        setcookie('album_id', $album_id, time() + (86400 * 30), "/"); // 86400 = 1 jour
        setcookie('titre_album', $titre_album, time() + (86400 * 30), "/");
        setcookie('annee_album', $annee_album, time() + (86400 * 30), "/");
        setcookie('anecdote', $anecdote, time() + (86400 * 30), "/");
        setcookie('nombre_titres', $nombre_titres, time() + (86400 * 30), "/");
        setcookie('categorie_id', $categorie_id, time() + (86400 * 30), "/");
        setcookie('categorie', $categorie, time() + (86400 * 30), "/");
        setcookie('artiste_id', $artiste_id, time() + (86400 * 30), "/");
        setcookie('artiste_nom', $artiste_nom, time() + (86400 * 30), "/");
        setcookie('artiste_prenom', $artiste_prenom, time() + (86400 * 30), "/");

    }
} else {
    echo "Aucun résultat trouvé.";
}



// Fermer la connexion à la base de données
$conn->close();
?>


<!-- Code Html Affichage Playlist -->




