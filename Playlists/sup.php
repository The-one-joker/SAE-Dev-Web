<?php
// Include the database configuration file
include '../PHP/connect.php';

$album_id_to_add = isset($_GET['album_id']) ? intval($_GET['album_id']) : 0;
$titre_id = isset($_GET['titre_id']) ? intval($_GET['titre_id']) : 0;

// Validate that both IDs are positive integers
if ($album_id_to_add > 0 && $titre_id > 0) {
    $sql = "DELETE FROM `CONTIENT` WHERE `TITRE_ID` = $titre_id AND `PLAYLIST_ID` = $album_id_to_add";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header('Location: ../Playlists/playal.php?album_id=' . $album_id_to_add);
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid ID values provided.";
}
?>
