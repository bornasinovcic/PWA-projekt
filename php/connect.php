<?php
    $dbc = mysqli_connect("localhost", "root", "", "projekt") or
        die('Error connecting to MySQL server' . mysqli_error());
    mysqli_set_charset($dbc, "utf8");
?>