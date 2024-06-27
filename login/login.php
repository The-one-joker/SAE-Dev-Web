<?php
session_start();

echo "Début du script<br>";

include '../PHP/connect.php';

$loginOK = false;

// Vérifier si le formulaire a été soumis et que les champs ne sont pas vides
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Formulaire soumis<br>";

    if (!empty($_POST['login']) && !empty($_POST['password'])) {
        echo "Champs non vides<br>";

        $login = $_POST['login'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM Utilisateurs WHERE Mail = '$login'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_assoc($result);
                // On vérifie que son mot de passe est correct
                if ($password == $data['Mdp']) {
                    $loginOK = true;
                    setcookie('ID', $data['USER_ID'], time() + (86400 * 30), "/");
                    setcookie('Type', $data['Type'], time() + (86400 * 30), "/");
                    setcookie('Nom', $data['Nom'], time() + (86400 * 30), "/");
                    setcookie('prenom', $data['Prenom'], time() + (86400 * 30), "/");
                    setcookie('mail', $data['Mail'], time() + (86400 * 30), "/");
                    //echo "UserId : " . $_SESSION['USER_ID'] . " <br>";
                    //echo "Type Account : " . $_SESSION['Type'] . " <br>";
                    //echo "Name : " . $_SESSION['Nom'] . " <br>";
                    //echo "Connexion réussie !<br>";

                    echo "UserID: " . $_COOKIE['ID'] . "<br>";
                    echo "Type Account: " . $_COOKIE['Type'] . "<br>";
                    echo "Name: " . $_COOKIE['Nom'] . "<br>";
                    echo "First Name: " . $_COOKIE['prenom'] . "<br>";
                    

                    if ($_SESSION['Type'] == 'Admin') {
                        
                        header('Location: ../index.html');
                        exit;
                    }
                    
                } else {
                    echo "Mot de passe incorrect.<br>";
                    header('Location: login.html');
                }
            } else {
                echo "Nom d'utilisateur non trouvé.<br>";
            }
        } else {
            echo "Erreur de requête : " . mysqli_error($conn) . "<br>";
        }
    } else {
        echo "Veuillez remplir tous les champs !<br>";
    }
} else {
    echo "Formulaire non soumis.<br>";
} 


// Fermer la connexion à la base de données
mysqli_close($conn);


echo "Fin du script<br>";


?>
