<?php
    include 'connect.php'; // Inclusion du fichier connect.php

    if (!empty($_POST['nom_playlist'])) {
        
        $sql = "INSERT INTO playlists (PLAYLIST_Nom, Partage) VALUES ('" . $_POST['nom_playlist'] . "', '" . $_POST['partager'] . "')";

        $sql_playlist = "SELECT MAX(PLAYLIST_ID) FROM playlists";
        $result_playlist = $conn->query($sql_playlist);
        $row_playlist = $result_playlist->fetch_assoc();

        $sql2 = "INSERT INTO a_cree (USER_ID, PLAYLIST_ID) VALUES (" . $_COOKIE['ID'] ."," . $row_playlist['MAX(PLAYLIST_ID)'] . ")";
        echo $sql2;
        if ($conn->query($sql) === TRUE) { // Vérifie si la requête d'insertion a réussi
            echo "Nouvel playlist créée avec succès";
            if ($conn->query($sql2) === TRUE) {
                echo "<br>Relation créateur-playlist ajoutée avec succès";
            } else {
                echo "Erreur: " . $sql2 . "<br>" . $conn->error;
            }
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error; // Affiche l'erreur en cas d'échec de la requête
        }

        if (isset($_FILES['pochette_play']['name']) AND !empty($_FILES['pochette_play']['name'])) {
            // Récupération de l'ID du dernier album ajouté
            
    
            $img_name3 = $_FILES['pochette_play']['name'];
            $tmp_name3 = $_FILES['pochette_play']['tmp_name'];
            $error3 = $_FILES['pochette_play']['error'];
    
            if($error3 === 0){
                $img_ex3 = pathinfo($img_name3, PATHINFO_EXTENSION);
                $img_ex_to_lc3 = strtolower($img_ex3);
                echo $row_playlist['MAX(PLAYLIST_ID)'];
                $allowed_exs = array('jpg', 'jpeg', 'png');
                if(in_array($img_ex_to_lc3, $allowed_exs)){
                    $new_img_name3 = $row_playlist['MAX(PLAYLIST_ID)'].'.'.$img_ex_to_lc3;
                    $img_upload_path3 = '../images/pochettes_playlists/'.$new_img_name3;
                    move_uploaded_file($tmp_name3, $img_upload_path3);
    
                    // Insérer dans la base de données
                    $sql = "UPDATE playlists SET Pochette_play = '" . $new_img_name3 . "' WHERE PLAYLIST_ID = " . $row_playlist['MAX(PLAYLIST_ID)'];
                    
                    if ($conn->query($sql) === TRUE) {
                        echo "<br>Pochette prise en compte avec succès";
                    } else {
                        echo "Erreur: " . $sql . "<br>" . $conn->error;
                    }
                    exit;
                }else {
                    echo "Mauvais format";
                    exit;
                }
            }else {
                echo "<br> Pas bon...";
                exit;
            }
        }
    }
    
echo "</br><button type='button'><a href='../Playlists/creation.php' style='text-decoration: none; color: inherit;'>Retour</a></button>"; // Affiche un bouton de retour
?>