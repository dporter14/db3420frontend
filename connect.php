<?php
    $conn_string = "host=localhost port=5432 dbname=schooldb user=school password=bchseagles";
    $db = pg_connect($conn_string);
    if(!$db) {
        echo "<p>Connection unsuccessful</p>";
    } else {
        echo "<p>Connetion successful</p>";
    }
?>