<?php
session_start();

include '../PHP/connect.php';

$loginOK = false;

// Vérifier si le formulaire a été soumis et que les champs ne sont pas vides
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['login']) && !empty($_POST['password'])) {

        $login = $_POST['login'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM Utilisateurs WHERE Mail = '$login'";
        $result = mysqli_query($conn, $sql);

        var_dump($password);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_assoc($result);
                // On vérifie que son mot de passe est correct
                $password_hash = $data['Mdp'];
                
                if (password_verify($password, $password_hash) == 1) {
                    $loginOK = true;
                    echo "<br>Connexion réussie !<br>";
                    setcookie('ID', $data['USER_ID'], time() + (86400 * 30), "/");
                    setcookie('Type', $data['Type'], time() + (86400 * 30), "/");
                    setcookie('Nom', $data['Nom'], time() + (86400 * 30), "/");
                    setcookie('prenom', $data['Prenom'], time() + (86400 * 30), "/");
                    setcookie('mail', $data['Mail'], time() + (86400 * 30), "/");
     
                    if ($_COOKIE ['Type'] == 'Admin') {
                        header('Location: ../administration/web_profil.php');
                        exit;
                    } else {
                        echo password_verify($password, $data['Mdp']);
                        header('Location: ../accueil/index.php');
                    }
                    
                } else {
                    echo "Mot de passe incorrect.<br>";
    
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

?>
