<?php
    include 'connect.php';

    $sql = "SELECT ALBUM_ID, Titre_Album FROM albums";
    $result = $conn->query($sql);
    
    echo "
        <td>
            <select class='form-select' aria-label='Type compte' name='select_album'>";

    if ($result->num_rows > 0) {
        // Parcourir les résultats et afficher chaque utilisateur dans le dropdown
        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["ALBUM_ID"] . "'>" . $row["Titre_Album"] . "</option>";
        }
    } else {
        echo '<a class="dropdown-item" href="#">Aucun utilisateur trouvé</a>';
    }
    
    echo "</select></td>";
    
?>