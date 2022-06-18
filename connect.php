<?php
    header('Content-Type: text/html; charset=utf-8');
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "projekt";
    $dbc = mysqli_connect($dbhost, $dbuser, $dbpass, $db) or
        die('Error connecting to MySQL server' . mysqli_error());
    mysqli_set_charset($dbc, "utf8");
?>