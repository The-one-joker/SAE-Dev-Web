<?php
    include '../PHP/connect.php'; // Inclusion du fichier connect.php

    // Update user
    if (!empty($_POST['nom_modif']) AND !empty($_POST['prenom_modif']) AND !empty($_POST['mail_modif'])) {
        $sql = "UPDATE Utilisateurs SET Nom = '" . $_POST['nom_modif'] . "', Prenom = '" . $_POST['prenom_modif'] . "', Mail = '" . $_POST['mail_modif'] . "' WHERE USER_ID = " . $_COOKIE['ID'];

        if ($conn->query($sql) === TRUE) {
        echo "Utilisateur modifié avec succès";
        } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Veuillez remplir au moins les champs Nom, Prénom et Mail";
    }
    

    // Update password
    if (!empty($_POST['mdp_modif'])) {
        $password_hash = password_hash($_POST['mdp_modif'], PASSWORD_DEFAULT); // Hash du mot de passe
        $sql = "UPDATE Utilisateurs SET Mdp = '" . $password_hash . "' WHERE USER_ID = " . $_COOKIE['ID']; // Requête SQL
        
        if ($conn->query($sql) === TRUE) {
            echo "<br>Mot de passe modifié avec succès";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
    }


    // Upload image
    if (isset($_FILES['pp']['name']) AND !empty($_FILES['pp']['name'])) {
         
         
        $img_name = $_FILES['pp']['name'];
        $tmp_name = $_FILES['pp']['tmp_name'];
        $error = $_FILES['pp']['error'];

        if($error === 0){
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);

            $allowed_exs = array('jpg', 'jpeg', 'png');
            if(in_array($img_ex_to_lc, $allowed_exs)){
                $new_img_name = $_COOKIE['ID'].'.'.$img_ex_to_lc;
                $img_upload_path = '../images/avatars/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into Database
                $sql = "UPDATE Utilisateurs SET Avatar = '" . $new_img_name . "' WHERE USER_ID = " . $_COOKIE['ID'];
                
                if ($conn->query($sql) === TRUE) {
                    echo "<br>Nouvel avatar pris en compte avec succès";
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
    
    echo "</br><button type='button'><a href='../administration/web_profil.php' style='text-decoration: none; color: inherit;'>Retour</a></button>";

    $conn->close();
?>