<?php
include '../PHP/connect.php';

$playlist_id = $album_id_to_add = isset($_GET['album_id']) ? $_GET['album_id'] : '';

$sql = "SELECT Partage FROM playlists WHERE PLAYLIST_ID = $playlist_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $partage = $row['Partage'];
    if ($partage == 1) {
        echo '<form action="" method="post" id="share-form" style =" display: flex;" data-custom-id="' . htmlspecialchars($playlist_id) . '">
                                <label class="switch">
                                    <input type="checkbox" checked id="share-checkbox">
                                    <span class="slider"></span>
                                </label>
                                </form>
                <script>
                    document.getElementById(\'share-checkbox\').addEventListener(\'change\', function() {
                    var form = document.getElementById(\'share-form\');
                    var playlistId = form.getAttribute(\'data-custom-id\'); // Retrieve the value of data-custom-id
                    
                        form.action = \'update_on.php?playlist_id=\' + playlistId;
        
            
        
                    
                    form.submit() 
                    });
                </script>';
    } else {
        echo '<form action="" method="post" id="share-form" style =" display: flex;" data-custom-id=' . htmlspecialchars($playlist_id) . '>
                        <label class="switch">
                            <input type="checkbox" id="share-checkbox">
                            <span class="slider"></span>
                        </label>
                        </form>
            <script>
                    document.getElementById(\'share-checkbox\').addEventListener(\'change\', function() {
                    var form = document.getElementById(\'share-form\');
                    var playlistId = form.getAttribute(\'data-custom-id\'); // Retrieve the value of data-custom-id
        
                    
                    form.action = \'update_off.php?playlist_id=\' + playlistId;
        
                    
                    form.submit()
                    });
            </script>';
    }
}

$conn->close();
?>