<?php
    include 'connect.php';

    $sql = "SELECT * FROM artistes";
    $result = $conn->query($sql);
    
    echo "
    <form method='post' action='../PHP/supprimer_artiste.php'>
    <table>
        <thead>
            <tr>
                <td>
                    <select class='form-select' aria-label='Type compte' name='select'>
                    <option selected>Utilisateur à supprimer</option>";

    if ($result->num_rows > 0) {
        // Parcourir les résultats et afficher chaque utilisateur dans le dropdown
        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["ARTISTE_ID"] . "'>" . $row["ARTISTE_Nom"] . " " . $row["ARTISTE_Prenom"] . "</option>";
        }
    } else {
        echo '<a class="dropdown-item" href="#">Aucun utilisateur trouvé</a>';
    }
    
    echo "</select></td>
        <td><button type='submit' class='btn btn-primary'>Supprimer</button></td>
        </tr></thead></table></form>";
    
?>
