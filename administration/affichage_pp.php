<?php

    include '../PHP/connect.php'; // Inclusion du fichier connect.php

    $sql = "SELECT Avatar FROM Utilisateurs WHERE USER_ID = " . $_COOKIE['ID'];
    $result = $conn->query($sql);
    echo "<img src='../images/avatars/" . $result->fetch_assoc()['Avatar'] . "' alt='Avatar' style='width: 100px; height: 100px; border-radius: 50%;'>";

    
?>