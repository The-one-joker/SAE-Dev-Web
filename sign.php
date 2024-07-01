<?php
session_start();

echo "Début du script d'inscription<br>";

include '/PHP/connect.php';

// Vérifier si le formulaire a été soumis et que les champs ne sont pas vides
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Formulaire soumis<br>";

    if (!empty($_POST['email']) && !empty($_POST['Mdp']) && !empty($_POST['Nom']) && !empty($_POST['Prenom'])) {
        echo "Champs non vides<br>";

        $email = $_POST['email'];
        $password = password_hash($_POST['Mdp'], PASSWORD_DEFAULT);
        $nom = $_POST['Nom'];
        $prenom = $_POST['Prenom'];
        $type = 'User';

        // Insertion des données dans la base de données
        $sql = "INSERT INTO Utilisateurs (Mail, Mdp, Nom, Prenom, Type) VALUES ('$email', '$password', '$nom', '$prenom','$type')";
        
        if (mysqli_query($conn, $sql)) {
            echo "Inscription réussie !<br>";
            // Rediriger vers la page de connexion ou d'accueil après l'inscription
            header('Location: login.html');
            exit;
        } else {
            echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Veuillez remplir tous les champs !<br>";
    }
} else {
    echo "Formulaire non soumis.<br>";
}

// Fermer la connexion à la base de données
mysqli_close($conn);

echo "Fin du script d'inscription<br>";
?>
