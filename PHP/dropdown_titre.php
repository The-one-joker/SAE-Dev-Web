<?php
    include 'connect.php';

    $sql = "SELECT TITRE_ID, Titre FROM titres";
    $result = $conn->query($sql);
    
    echo "
        <td>
            <select class='form-select' aria-label='Type compte' name='select_titre'>";

    if ($result->num_rows > 0) {
        // Parcourir les résultats et afficher chaque utilisateur dans le dropdown
        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["TITRE_ID"] . "'>" . $row["Titre"] . "</option>";
        }
    } else {
        echo '<a class="dropdown-item" href="#">Aucun utilisateur trouvé</a>';
    }
    
    echo "</select></td>";
    
?>