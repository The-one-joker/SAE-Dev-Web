

<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlists</title>
    <link rel="stylesheet" href="ryth.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/23cecef777.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <div class="sidebar">
            <div class="logo">
                <a href="../accueil/index.php">
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
                        <a href="../albums/affal.php">
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
                        <a href="../albums/affal.php">
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

            <!-- MYYYYYY PLLLLLAAYYYYYLISSSSSTTTTT PARRRRTTTTTTT -->
            <div class="spotify-playlists">
                <h2>My Playlists</h2>
                <div id="wrapper">
                    <div id="carousel">
                        <div id="content">
                            <?php include 'recupfav.php'?>
                        </div>
                    </div>
                    <button id="prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0V0z"></path>
                            <path d="M15.61 7.41L14.2 6l-6 6 6 6 1.41-1.41L11.03 12l4.58-4.59z"></path>
                        </svg>
                    </button>
                    <button id="next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0V0z"></path>
                            <path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="spotify-playlists">
                <h2>Top Playlists </h2>
                <div id="wrapper">
                    <div id="carousel">
                        <div id="content">
                            <?php include 'top.php'?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="spotify-playlists">
                <h2>Public Playlists</h2>
                <div id="wrapper2">
                    <div id="carousel2">
                        <div id="content2">
                            <?php include 'recupal.php'?>
                            
                        </div>
                    </div>
                    <button id="prev2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0V0z"></path>
                            <path d="M15.61 7.41L14.2 6l-6 6 6 6 1.41-1.41L11.03 12l4.58-4.59z"></path>
                        </svg>
                    </button>
                    <button id="next2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0V0z"></path>
                            <path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <hr>
        </div>
    </main>
    <script src="test.js"></script>
</body>
</html>