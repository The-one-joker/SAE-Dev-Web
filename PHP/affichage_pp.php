<?php

    include 'connect.php'; // Inclusion du fichier connect.php

    $sql = "SELECT Avatar FROM Utilisateurs WHERE USER_ID = " . $_COOKIE['ID'];
    $result = $conn->query($sql);
    echo $result->fetch_assoc()['Avatar']; // Retourne le nom du fichier avatar de l'utilisateur en fonction de son ID (ex : 15.png)
    
?>