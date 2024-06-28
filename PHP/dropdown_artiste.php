<?php
    include 'connect.php'; // Include the file that establishes the database connection

    $sql = "SELECT * FROM artistes"; // SQL query to select all rows from the 'artistes' table
    $result = $conn->query($sql); // Execute the query and store the result in the $result variable
    
    echo "
    <form method='post' action='../PHP/supprimer_artiste.php'> <!-- Form to submit the selected artist for deletion -->
    <table>
        <thead>
            <tr>
                <td>
                    <select class='form-select' aria-label='Type compte' name='select'> <!-- Dropdown to select the artist to delete -->
                    <option selected>Utilisateur à supprimer</option>"; // Default option in the dropdown

    if ($result->num_rows > 0) {
        // If there are rows returned from the query
        while($row = $result->fetch_assoc()) {
            // Loop through each row and display each artist as an option in the dropdown
            echo "<option value='" . $row["ARTISTE_ID"] . "'>" . $row["ARTISTE_Nom"] . " " . $row["ARTISTE_Prenom"] . "</option>";
        }
    } else {
        // If no rows are returned from the query, display a message indicating no users found
        echo '<a class="dropdown-item" href="#">Aucun utilisateur trouvé</a>';
    }
    
    echo "</select></td>
        <td><button type='submit' class='btn btn-primary'>Supprimer</button></td>
        </tr></thead></table></form>"; // Close the form and table

?>
