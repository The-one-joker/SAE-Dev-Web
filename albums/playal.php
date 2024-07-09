<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlists</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/23cecef777.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="playal.css">
</head>
<body>
    <main>
        <div class="sidebar">
            <div class="logo">
                <a href="#">
                    <img src="../images/avatars/002.png" alt="Logo">
                </a>
            </div>
            <div class="navigation">
                <ul>
                    <li>
                        <a href="../accueil/index.php">
                            <span class="fa fa-home"></span>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="../accueil/index.php">
                            <span class="icon-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-disc" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="M10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0M8 4a4 4 0 0 0-4 4 .5.5 0 0 1-1 0 5 5 0 0 1 5-5 .5.5 0 0 1 0 1m4.5 3.5a.5.5 0 0 1 .5.5 5 5 0 0 1-5 5 .5.5 0 0 1 0-1 4 4 0 0 0 4-4 .5.5 0 0 1 .5-.5"/>
                                </svg>
                            </span>
                            <span class="boom">Albums</span>
                        </a>
                    </li>
                    <li>
                        <a href="../Playlists/affichage.php">
                            <span class="fa fas fa-book"></span>
                            <span>Your Playlists</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="navigation">
                <ul>
                    <li>
                        <a href="../Playlists/creation.php">
                            <span class="fa fas fa-plus-square"></span>
                            <span>Create Playlist</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="fa fas fa-heart"></span>
                            <span>Favorite Albums</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-container">
            <div class="topbar">
                <div class="navbar">
                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                        <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                    </form>
                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../images/avatars/<?php include '../PHP/affichage_pp.php'; ?>" alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small">
                            <li><a class="dropdown-item" href="../administration/web_profil.php">Profil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="index.html">Se déconnecter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="segment">
            <div class="container">
                <div class="header">
                    <div class="big-square"> <?php include 'pochette.php'; ?> </div>
                    <?php include 'infoal.php'; ?>
                    
                </div>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Titres</th>
            
                                <th>Catégorie</th>
                                <th>Artiste</th>
                                <th>Année</th>
                                <th>Durée</th>
                            </tr>
                        </thead>
                        <tbody id="playlist-rows" style="color: white;">
                            <?php
                                include 'recup.php';
                            ?>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </main>
</body>
</html>
