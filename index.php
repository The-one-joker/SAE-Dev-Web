<?php 
session_start();  // Démarrage de la session

// Paramètres de connexion à la base de données
$host = 'localhost';
$user = 'root';
$password = 'root';
$database = 'Rythmix';

// Connexion à la base de données
$conn = new mysqli($host, $user, $password, $database);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}
?>