<?php
    include 'connect.php';

    $sql = "SELECT USER_ID, nom, prenom FROM Utilisateurs";
    $result = $conn->query($sql);
    
    echo "
    <form method='post' action='../PHP/supprimer.php'>
    <table>
        <thead>
            <tr>
                <td>
                    <select class='form-select' aria-label='Type compte' name='select'>
                    <option selected>Utilisateur à supprimer</option>";

    if ($result->num_rows > 0) {
        // Parcourir les résultats et afficher chaque utilisateur dans le dropdown
        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["USER_ID"] . "'>" . $row["nom"] . " " . $row["prenom"] . "</option>";
        }
    } else {
        echo '<a class="dropdown-item" href="#">Aucun utilisateur trouvé</a>';
    }
    
    echo "</select></td>
        <td><button type='submit' class='btn btn-primary'>Supprimer</button></td>
        </tr></thead></table></form>";
    
    
    
?>
