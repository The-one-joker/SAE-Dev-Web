<?php
include 'connect.php'; // Inclusion du fichier connect.php

$user_id = $_COOKIE['ID']; // Récupère l'ID de l'utilisateur connecté

if (!empty($_POST['nom_playlist'])) {
    
    // Requête pour insérer la nouvelle playlist
    $sql = "INSERT INTO playlists (PLAYLIST_Nom, Partage) VALUES ('" . $_POST['nom_playlist'] . "', '" . $_POST['partager'] . "')";
    
    if ($conn->query($sql) === TRUE) { // Vérifie si la requête d'insertion a réussi
        
        // Récupération de l'ID de la dernière playlist ajoutée
        $playlist_id = $conn->insert_id;

        // Requête pour ajouter une relation entre l'utilisateur et la playlist
        $sql2 = "INSERT INTO a_cree (USER_ID, PLAYLIST_ID) VALUES (". $user_id .", " . $playlist_id . ")";
        
        echo $sql2; // Affiche la requête pour le débogage
        
        if ($conn->query($sql2) === TRUE) { // Vérifie si la requête d'insertion de la relation a réussi
            echo "Nouvelle playlist créée avec succès";
            
            // Traitement de la pochette de la playlist (si elle est fournie)
            if (isset($_FILES['pochette_play']['name']) AND !empty($_FILES['pochette_play']['name'])) {
                $img_name3 = $_FILES['pochette_play']['name'];
                $tmp_name3 = $_FILES['pochette_play']['tmp_name'];
                $error3 = $_FILES['pochette_play']['error'];
                
                if ($error3 === 0) {
                    $img_ex3 = pathinfo($img_name3, PATHINFO_EXTENSION);
                    $img_ex_to_lc3 = strtolower($img_ex3);
                    
                    $allowed_exs = array('jpg', 'jpeg', 'png');
                    if (in_array($img_ex_to_lc3, $allowed_exs)) {
                        $new_img_name3 = $playlist_id . '.' . $img_ex_to_lc3;
                        $img_upload_path3 = '../images/pochettes_playlists/' . $new_img_name3;
                        move_uploaded_file($tmp_name3, $img_upload_path3);
                        
                        // Mise à jour de la pochette de la playlist dans la base de données
                        $sql_update = "UPDATE playlists SET Pochette_play = '" . $new_img_name3 . "' WHERE PLAYLIST_ID = " . $playlist_id;
                        
                        if ($conn->query($sql_update) === TRUE) {
                            echo "<br>Pochette prise en compte avec succès";
                        } else {
                            echo "Erreur lors de la mise à jour de la pochette: " . $conn->error;
                        }
                        exit;
                    } else {
                        echo "Mauvais format d'image";
                        exit;
                    }
                } else {
                    echo "<br> Erreur lors de l'upload de l'image";
                    exit;
                }
            }
        } else {
            echo "Erreur lors de la création de la relation: " . $conn->error; // Affiche l'erreur en cas d'échec de la requête
        }
    } else {
        echo "Erreur lors de la création de la playlist: " . $conn->error; // Affiche l'erreur en cas d'échec de la requête
    }
}

echo "</br><button type='button'><a href='../Playlists/creation.php' style='text-decoration: none; color: inherit;'>Retour</a></button>"; // Affiche un bouton de retour
?>
