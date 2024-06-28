<?php
    include 'connect.php';

    $sql = "SELECT * FROM artistes";
    $result = $conn->query($sql);
    
    echo "
        <td>
            <select class='form-select' aria-label='Type compte' name='select_artiste'>";

    if ($result->num_rows > 0) {
        // Parcourir les résultats et afficher chaque utilisateur dans le dropdown
        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["ARTISTE_ID"] . "'>" . $row["ARTISTE_Nom"] . " " . $row["ARTISTE_Prenom"] . "</option>";
        }
    } else {
        echo '<a class="dropdown-item" href="#">Aucun utilisateur trouvé</a>';
    }
    
    echo "</select></td>";
    
?>
