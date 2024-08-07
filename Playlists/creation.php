<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Créer une playlist</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        
        <script src="multiple_select.js"></script>
        
        <header class="p-3 mb-3 border-bottom text-bg-dark">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                    </a>
        
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="../accueil/index.php" class="nav-link px-2 text-white">Accueil</a></li>
                        <li><a href="../Playlists/affichage.php" class="nav-link px-2 text-white">Playlist</a></li>
                        <li><a href="creation.php" class="nav-link px-2 text-secondary">Créer playlist</a></li>
                        <li><a href="../albums/affal.php" class="nav-link px-2 text-white">Favoris</a></li>
                    </ul>
        
                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                        <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                    </form>
        
                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../images/avatars/<?php include '../PHP/affichage_pp.php'?>" alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small">
                            <li><a class="dropdown-item" href="../administration/web_profil.php">Profil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="index.html">Se déconnecter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
    </head>

    <body>
        <form action="../PHP/ajout_play.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom de la playlist</label>
                <input type="text" class="form-control" id="nom" name="nom_playlist">
            </div>
             
    
            <div class="mb-3">
                <label for="partager" class="form-label">Partager la playlist ?</label>
                <select class="form-select" id="partager" name="partager">
                    <option value="1">Oui</option>
                    <option value="0">Non</option>
                </select>
            </div>
            <label>Image de la playlist</label>
            <input class="form-control" type="file" name="pochette_play">
            <br>
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </body>
</html>