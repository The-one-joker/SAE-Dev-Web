<?php
session_start();

echo "Début du script d'inscription<br>";

// Paramètres de connexion à la base de données
$host = 'localhost';
$user = 'root';
$password = 'root';
$database = 'Rythmix';

// Connexion à la base de données avec mysqli_connect
$conn = mysqli_connect($host, $user, $password, $database);

// Vérifier la connexion
if (!$conn) {
    die("La connexion a échoué : " . mysqli_connect_error());
}

// Vérifier si le formulaire a été soumis et que les champs ne sont pas vides
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Formulaire soumis<br>";

    if (!empty($_POST['email']) && !empty($_POST['Mdp']) && !empty($_POST['Nom']) && !empty($_POST['Prenom'])) {
        echo "Champs non vides<br>";

        $email = $_POST['email'];
        $password = $_POST['Mdp'];
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
