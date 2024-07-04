<?php
    include '../PHP/connect.php'; // Inclusion du fichier connect.php
    
    // Mettre à jour l'utilisateur
    if (!empty($_POST['nom_modif']) && !empty($_POST['prenom_modif']) && !empty($_POST['mail_modif'])) {
        $sql = "UPDATE Utilisateurs SET Nom = '" . $_POST['nom_modif'] . "', Prenom = '" . $_POST['prenom_modif'] . "', Mail = '" . $_POST['mail_modif'] . "' WHERE USER_ID = " . $_COOKIE['ID'];
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Modification du Compte effectué avec succès'); window.location.href = '../administration/web_profil.php';</script>";
        } else {
            echo "<script>alert('Erreur: " . $sql . "\\n" . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('Veuillez remplir au moins les champs Nom, Prénom et Mail');</script>";
    }
    
    // Mettre à jour le mot de passe
    if (!empty($_POST['mdp_modif'])) {
        $password_hash = password_hash($_POST['mdp_modif'], PASSWORD_DEFAULT); // Hash du mot de passe
        $sql = "UPDATE Utilisateurs SET Mdp = '" . $password_hash . "' WHERE USER_ID = " . $_COOKIE['ID']; // Requête SQL
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Mot de passe modifié avec Succès'); window.location.href = '../administration/web_profil.php';</script>";
        } else {
            echo "<script>alert('Erreur: " . $sql . "\\n" . $conn->error . "');</script>";
        }
    }
    
    // Télécharger une image
    if (isset($_FILES['pp']['name']) && !empty($_FILES['pp']['name'])) {
        $img_name = $_FILES['pp']['name'];
        $tmp_name = $_FILES['pp']['tmp_name'];
        $error = $_FILES['pp']['error'];
        
        if ($error === 0) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);
            $allowed_exs = array('jpg', 'jpeg', 'png');
            
            if (in_array($img_ex_to_lc, $allowed_exs)) {
                $new_img_name = $_COOKIE['ID'].'.'.$img_ex_to_lc;
                $img_upload_path = '../images/avatars/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                
                // Insérer dans la base de données
                $sql = "UPDATE Utilisateurs SET Avatar = '" . $new_img_name . "' WHERE USER_ID = " . $_COOKIE['ID'];
                
                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Nouvel avatar pris en compte avec succès'); window.location.href = '../administration/web_profil.php';</script>";
                } else {
                    echo "<script>alert('Erreur: " . $sql . "\\n" . $conn->error . "');</script>";
                }
                exit;
            } else {
                echo "<script>alert('Mauvais format');</script>";
                exit;
            }
        } else {
            echo "<script>alert('Erreur autre ...');</script>";
            exit;
        }
    }
    
    // Fermer la connexion à la base de données
    $conn->close();
?>
