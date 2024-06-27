<!DOCTYPE html>
    <html lang="fr" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profil</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <header class="p-3 mb-3 border-bottom text-bg-dark">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                    </a>
        
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="../index_log.html" class="nav-link px-2 text-white">Accueil</a></li>
                        <li><a href="Playlists/affichage.html" class="nav-link px-2 text-white">Playlist</a></li>
                        <li><a href="Playlists/creation.html" class="nav-link px-2 text-white">Créer playlist</a></li>
                        <li><a href="Playlists/affichage.html" class="nav-link px-2 text-white">Favoris</a></li>
                    </ul>
        
                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                        <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                    </form>
        
                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small">
                            <li><a class="dropdown-item" href="/administration/profil.html">Profil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
    </head>
    <body>
        <h1>Profil utilisateur</h1>
        <h1>Liste des utilisateurs</h1>
        <?php
        include '../PHP/profil.php';
        ?>
        <h1>Nouvel utilisateur</h1>
        <form method='post' action='../PHP/ajout.php'>
            <table class='table' border='1'>
                <thead>
                    <tr>
                        <th scope='col'>Nom</th>
                        <th scope='col'>Prénom</th>
                        <th scope='col'>Mail</th>
                        <th scope='col'>Mot de passe</th>
                        <th scope='col'>Type</th>
                        <th scope='col'></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type='text' class='form-control' placeholder='Nom' aria-label='Search' name="nom"></td>
                        <td><input type='text' class='form-control' placeholder='Prénom' aria-label='Search' name="prenom"></td>
                        <td><input type='mail' class='form-control' placeholder='Mail' aria-label='Search' name="mail"></td>
                        <td><input type='password' class='form-control' placeholder='Mot de passe' aria-label='Search' name="mdp"></td>
                        <td><select class='form-select' aria-label='Type compte' name="type">
                        <option value='User'>Utilisateur</option>
                        <option value='Admin'>Administrateur</option>
                        </select></td>
                        <td><button type='submit' class='btn btn-primary'>Ajouter</button></td>
                    </tr>
                </tbody>
            </table>
        </form>
        <h1>Supprimer un utilisateur</h1>
        <?php
        include '../PHP/dropdown.php';
        ?>
        <h1>Modifier un utilisateur</h1>
        <form method='post' action='../PHP/modification.php'>
            <table class='table' border='1'>
                <thead>
                    <tr>
                        <th scope='col'>ID</th>
                        <th scope='col'>Nom</th>
                        <th scope='col'>Prénom</th>
                        <th scope='col'>Mail</th>
                        <th scope='col'>Mot de passe</th>
                        <th scope='col'>Type</th>
                        <th scope='col'></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type='text' class='form-control' placeholder="ID de l'utilisateur" aria-label='Search' name="id_modif"></td>
                        <td><input type='text' class='form-control' placeholder='Nom' aria-label='Search' name="nom_modif"></td>
                        <td><input type='text' class='form-control' placeholder='Prénom' aria-label='Search' name="prenom_modif"></td>
                        <td><input type='mail' class='form-control' placeholder='Mail' aria-label='Search' name="mail_modif"></td>
                        <td><input type='password' class='form-control' placeholder='Mot de passe' aria-label='Search' name="mdp_modif"></td>
                        <td><select class='form-select' aria-label='Type compte' name="type_modif">
                        <option selected>Type de compte</option>
                        <option value='Admin'>Administrateur</option>
                        <option value='User'>Utilisateur</option>
                        </select></td>
                        <td><button type='submit' placeholder='Mot de passe' class='btn btn-primary'>Modifier</button></td>
                    </tr>
                </tbody>
            </table>
        </form>
        <h1>Modifier ses informations</h1>
        <?php
        include 'modification_user.php';
        ?>
    </body>
</html>