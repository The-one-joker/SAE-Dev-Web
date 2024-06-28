<?php
    if ($_COOKIE['Type'] == 'Admin') {
        echo "
        <h1>Liste des utilisateurs</h1>";
        include '../PHP/profil.php';
        echo "
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
                            <td><input type='text' class='form-control' placeholder='Nom' aria-label='Search' name='nom'></td>
                            <td><input type='text' class='form-control' placeholder='Prénom' aria-label='Search' name='prenom'></td>
                            <td><input type='mail' class='form-control' placeholder='Mail' aria-label='Search' name='mail'></td>
                            <td><input type='password' class='form-control' placeholder='Mot de passe' aria-label='Search' name='mdp'></td>
                            <td><select class='form-select' aria-label='Type compte' name='type'>
                            <option value='User'>Utilisateur</option>
                            <option value='Admin'>Administrateur</option>
                            </select></td>
                            <td><button type='submit' class='btn btn-primary'>Ajouter</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <h1>Supprimer un utilisateur</h1>";
        include '../PHP/dropdown.php';
        echo "
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
                            <td><input type='text' class='form-control' placeholder='ID utilisateur' aria-label='Search' name='id_modif'></td>
                            <td><input type='text' class='form-control' placeholder='Nom' aria-label='Search' name='nom_modif'></td>
                            <td><input type='text' class='form-control' placeholder='Prénom' aria-label='Search' name='prenom_modif'></td>
                            <td><input type='mail' class='form-control' placeholder='Mail' aria-label='Search' name='mail_modif'></td>
                            <td><input type='password' class='form-control' placeholder='Mot de passe' aria-label='Search' name='mdp_modif'></td>
                            <td><select class='form-select' aria-label='Type compte' name='type_modif'>
                            <option selected>Type de compte</option>
                            <option value='Admin'>Administrateur</option>
                            <option value='User'>Utilisateur</option>
                            </select></td>
                            <td><button type='submit' placeholder='Mot de passe' class='btn btn-primary'>Modifier</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        ";
        echo "
            <h1>Ajouter un artiste</h1>
            <form method='post' action='../PHP/ajout_artiste.php'>
                <table class='table' border='1'>
                    <thead>
                        <tr>
                            <th scope='col'>Nom</th>
                            <th scope='col'>Prénom</th>
                            <th scope='col'></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type='text' class='form-control' placeholder='Nom' aria-label='Search' name='nom_artiste'></td>
                            <td><input type='text' class='form-control' placeholder='Prénom' aria-label='Search' name='prenom_artiste'></td>
                            <td><button type='submit' class='btn btn-primary'>Ajouter</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        ";

        // Supprimer un artiste
        echo "
            <h1>Supprimer un artiste</h1>";
        include '../PHP/dropdown_artiste.php';

        // Supprimer un album
        echo "
            <h1>Ajouter un album</h1>
            <form method='post' action='../PHP/ajout_album.php' enctype='multipart/form-data'>
                <table class='table' border='1'>
                    <thead>
                        <tr>
                            <th scope='col'>Nom</th>
                            <th scope='col'>Artiste</th>
                            <th scope='col'>Année de sortie</th>
                            <th scope='col'>Genre</th>
                            <th scope='col'>Anecdote</th>
                            <th scope='col'>Pochette</th>
                            <th scope='col'></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type='text' class='form-control' placeholder='Nom' aria-label='Search' name='nom_album'></td>";
        include '../PHP/dropdown_album_artiste.php';
        echo "
                            <td><input type='number' class='form-control' placeholder='Année de sortie' aria-label='Search' name='annee_sortie'></td>";
        include '../PHP/dropdown_album_genre.php';
        echo "
                            <td><input type='text' class='form-control' placeholder='Anecdote' aria-label='Search' name='anecdote'></td>
                            <td><input type='file' class='form-control' placeholder='Pochette' aria-label='Search' name='ppA'></td>
                            <td><button type='submit' class='btn btn-primary'>Ajouter</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        ";

        // Supprimer un album
        echo "
            <h1>Supprimer un album</h1>
            <form method='post' action='../PHP/supprimer_album.php'>
                <table>
                    <thead>
                        <tr>";
        include '../PHP/dropdown_album_album.php';
        echo "
                            <td><button type='submit' class='btn btn-primary'>Supprimer</button></td>
                        </tr>
                     </thead>
                </table>
            </form>";  

        // Ajouter un titre
        echo "
            <h1>Ajouter un titre</h1>
            <form method='post' action='../PHP/ajout_titre.php'>
                <table class='table' border='1'>
                    <thead>
                        <tr>
                            <th scope='col'>Nom</th>
                            <th scope='col'>Artiste</th>
                            <th scope='col'>Album</th>
                            <th scope='col'>Année de sortie</th>
                            <th scope='col'>Durée</th>
                            <th scope='col'>Genre</th>
                            <th scope='col'></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type='text' class='form-control' placeholder='Nom' aria-label='Search' name='nom_titre'></td>
        ";
        include '../PHP/dropdown_album_artiste.php';
        include '../PHP/dropdown_album_album.php';
        echo "
                            <td><input type='number' class='form-control' placeholder='Année de sortie' aria-label='Search' name='annee_sortie'></td>
                            <td><input type='time' step='2' class='form-control' placeholder='Durée' aria-label='Search' name='duree'></td>";
        include '../PHP/dropdown_album_genre.php';
        echo "
                            <td><button type='submit' class='btn btn-primary'>Ajouter</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>";

        // Supprimer un titre
        echo "
            <h1>Supprimer un titre</h1>
            <form method='post' action='../PHP/supprimer_titre.php'>
                <table>
                    <thead>
                        <tr>";
        include '../PHP/dropdown_titre.php';
        echo "
                            <td><button type='submit' class='btn btn-primary'>Supprimer</button></td>
                        </tr>
                     </thead>
                </table>
            </form>";             
    }
?>