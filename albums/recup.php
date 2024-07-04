
<?php
// Assuming you have a database connection established
include '../PHP/connect.php';

// SQL query to select all elements from the "album" table
$query = "SELECT * FROM albums";

// Execute the query
$result = mysqli_query($connection, $query);

// Check if the query was successful
if ($result) {
    // Fetch all rows from the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Access the columns of each row
        $albumId = $row['ALBUM_ID'];
        $albumName = $row['Titre_Album'];
        // ...
        // Do something with the data
    }

    // Free the result set
    mysqli_free_result($result);
} else {
    // Handle the query error
    echo "Error executing the query: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>