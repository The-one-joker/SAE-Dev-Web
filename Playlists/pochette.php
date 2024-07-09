<?php
include '../PHP/connect.php';

// Album ID for which you want to retrieve the image name
$album_id = $playlist_id = isset($_GET['album_id']) ? $_GET['album_id'] : '';

// SQL query to retrieve the album image name
$sql = "SELECT Pochette_play FROM playlists WHERE PLAYLIST_ID = $album_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Retrieve the image name
    $row = $result->fetch_assoc();
    $image_name = $row['Pochette_play'];
    echo '<img src="../images/pochettes_playlists/' . htmlspecialchars($image_name) . '" style="width: 100%; height: 100%;" alt="Album Image">';
} else {
    echo "No image found for this album.";
}

$conn->close();
?>