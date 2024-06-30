<?php
    include 'connect.php'; // Inclusion du fichier connect.php
    if (!empty($_POST['nom_modif']) AND !empty($_POST['prenom_modif']) AND !empty($_POST['mail_modif']) AND !empty($_POST['type_modif'])) {
        $password_hash = password_hash($_POST['mdp_modif'], PASSWORD_DEFAULT);
        $sql = "UPDATE Utilisateurs SET Nom = '" . $_POST['nom_modif'] . "', Prenom = '" . $_POST['prenom_modif'] . "', Mail = '" . $_POST['mail_modif'] . "', Type = '" . $_POST['type_modif'] . "' WHERE USER_ID = " . $_POST['id_modif'];

        if ($conn->query($sql) === TRUE) {
            echo "Utilisateur modifié avec succès";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
    }
    if (!empty($_POST['mdp_modif'])) {
        $password_hash = password_hash($_POST['mdp_modif'], PASSWORD_DEFAULT);
        $sql = "UPDATE Utilisateurs SET Mdp = '" . $password_hash . "' WHERE USER_ID = " . $_POST['id_modif'];
        
        if ($conn->query($sql) === TRUE) {
            echo "<br>Mot de passe modifié avec succès";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Veuillez remplir au moins les champs Nom, Prénom, Mail et Type";
    }
    
    echo "</br><button type='button'><a href='../administration/web_profil.php' style='text-decoration: none; color: inherit;'>Retour</a></button>";
    $conn->close();
?>