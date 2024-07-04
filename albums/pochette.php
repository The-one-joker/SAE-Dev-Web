<?php
include '../PHP/connect.php';

// ID de l'album pour lequel vous souhaitez récupérer le nom de l'image
$album_id = $_GET['ALBUM_ID']; // Exemple, à remplacer par la méthode appropriée pour obtenir l'album ID

// Requête SQL pour récupérer le nom de l'image de l'album
$sql = "SELECT Pochette FROM albums WHERE ALBUM_ID = $album_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Récupérer le nom de l'image
    $row = $result->fetch_assoc();
    $image_name = $row['Pochette'];
    echo ' . $image_name . ';
} else {
    echo "Aucune image trouvée pour cet album.";
}

$conn->close();
?>