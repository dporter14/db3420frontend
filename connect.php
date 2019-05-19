<?php
    $conn_string = "host=localhost port=5432 dbname=schooldb user=importd password=importd";
    $db = pg_connect($conn_string);
    if(!$db) {
        echo "<p>Connection unsuccessful</p>";
    } else {
        $_SESSION["db"] = $db;
        echo "<br>";
    }
?>