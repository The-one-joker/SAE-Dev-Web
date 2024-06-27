<?php
    echo $_COOKIE['ID'] . "<br>";
    echo $_COOKIE['Type'] . "<br>";
    echo $_COOKIE['Nom'] . "<br>";
    echo $_COOKIE['prenom'] . "<br>";

    include '../PHP/connect.php'; 
    

    echo "
    <form method='post' action='../PHP/modification_user.php'>
        <table class='table' border='1'>
            <thead>
                <tr>
                    <th scope='col'>Nom</th>
                    <th scope='col'>Prénom</th>
                    <th scope='col'>Mail</th>
                    <th scope='col'>Mot de passe</th>
                    <th scope='col'></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type='text' class='form-control' placeholder='Nom' aria-label='Search' name='nom_modif'></td>
                    <td><input type='text' class='form-control' placeholder='Prénom' aria-label='Search' name='prenom_modif'></td>
                    <td><input type='mail' class='form-control' placeholder='Mail' aria-label='Search' name='mail_modif'></td>
                    <td><input type='password' class='form-control' placeholder='Mot de passe' aria-label='Search' name='mdp_modif'></td>
                    <td><button type='submit' class='btn btn-primary'>Modifier</button></td>
                </tr>
            </tbody>
        </table>
    </form>";
?>
