<?php
    include 'connect.php'; // Inclusion du fichier connect.php

    if (!empty($_POST['nom_album']) AND !empty($_POST['annee_sortie']) AND !empty($_POST['anecdote'])) {
        // Insert album
        $sql = "INSERT INTO albums (Titre_Album, ARTISTE_ID, Annee_Album, Categorie_ID, Annecdote) VALUES ('" . $_POST['nom_album'] . "', '" . $_POST['select_artiste'] . "', '" . $_POST['annee_sortie'] . "', '" . $_POST['select_genre'] . "','" . $_POST['anecdote'] . "')";
        if ($conn->query($sql) === TRUE) {
            echo "Nouvel album ajouté avec succès";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
        
        if (isset($_FILES['ppA']['name']) AND !empty($_FILES['ppA']['name'])) {
            // Récupérer l'ID de la dernière playlist
            $sql_album = "SELECT MAX(Album_ID) FROM albums";
            $result_album = $conn->query($sql_album);
            $row_album = $result_album->fetch_assoc();
         
            $img_name2 = $_FILES['ppA']['name'];
            $tmp_name2 = $_FILES['ppA']['tmp_name'];
            $error2 = $_FILES['ppA']['error'];

            if($error2 === 0){
                $img_ex2 = pathinfo($img_name2, PATHINFO_EXTENSION);
                $img_ex_to_lc2 = strtolower($img_ex2);
    
                $allowed_exs = array('jpg', 'jpeg', 'png');
                if(in_array($img_ex_to_lc2, $allowed_exs)){
                    $new_img_name2 = $row_album['MAX(Album_ID)'].'.'.$img_ex_to_lc2;
                    $img_upload_path2 = '../images/pochettes/'.$new_img_name2;
                    move_uploaded_file($tmp_name2, $img_upload_path2);
    
                    // Insert into Database
                    $sql3 = "UPDATE albums SET Pochette = '" . $new_img_name2 . "' WHERE Album_ID = " . $row_album['MAX(Album_ID)'];
                    
                    if ($conn->query($sql3) === TRUE) {
                        echo "<br>Nouvel avatar pris en compte avec succès";
                    } else {
                        echo "Erreur: " . $sql3 . "<br>" . $conn->error;
                    }
                    exit;
                }else {
                    echo "Mauvais format";
                    exit;
                }
            }else {
                echo "<br> Erreur inconnue lors de l'upload de l'image";
                exit;
            }
        }
    } else {
        echo "Veuillez remplir tous les champs";
        exit;
    }

echo "</br><button type='button'><a href='../administration/web_profil.php' style='text-decoration: none; color: inherit;'>Retour</a></button>";
?>