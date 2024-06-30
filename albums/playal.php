


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlists</title>
    <link rel="stylesheet" href="playform.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="big-square"></div>
            <div class="title-info">
                <h1>Titre de la playlist</h1>
                <div class="info">
                    <p>Créé par</p>
                    <p>Nombre d’éléments</p>
                </div>
            </div>
            <div class="actions">
                <button class="action-btn" onclick="">&#10006; Supprimer des titres</button>
                <label class="switch">
                    <input type="checkbox" id="share-checkbox">
                    <span class="slider"></span>
                </label>
                <span>Partager la playlist</span>
                <button class="action-btn" onclick="">&#10006; Supprimer la playlist</button>
            </div>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Titres</th>
                        <th>Albums</th>
                        <th>Catégorie</th>
                        <th>Artiste</th>
                        <th>Année</th>
                        <th>Durée</th>
                    </tr>
                </thead>
                <tbody id="playlist-rows">
                    <?php
                        include  'recup.php';
                    ?>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
    <script src="scripts.js"></script>
</body>
</html>
