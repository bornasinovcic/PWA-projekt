<?php
    session_start();
    require 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require '../html/head.html'?>
</head>
<body>
    <?php require 'header.php'?>
    <?php require '../html/navigation.html'?>
    <article>
        <div class="container bg-white mt-1">
            <div class="row">
                <div class="col fs-5 fw-bold text-danger mb-1 mt-1">
                    U.S.
                </div>
            </div>
        </div>
        <div class="container bg-white">
            <div class="parent text-center">
                <?php
                    $arhiva = 1;
                    $category = "U.S.";
                    $query = "SELECT * FROM vijesti WHERE kategorija = ? AND arhiva = ?;";
                    $stmt = mysqli_stmt_init($dbc);
                    if (!mysqli_stmt_prepare($stmt, $query)) {
                        echo "failed";
                    } else {
                        mysqli_stmt_bind_param($stmt, "si", $category, $arhiva);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "
                                <div class='child'>
                                    <a href='./clanak.php?id=${row['id']}'>
                                        <img src='../images/${row['slika']}' alt='${row['slika']}'>
                                        <h4>${row['naslov']}</h4>
                                    </a>
                                </div>
                            ";
                        }
                    }
                ?>
            </div>
        </div>
        <div class="container bg-white">
            <div class="row">
                <div class="col fs-5 fw-bold text-danger mb-1 mt-1">
                    World
                </div>
            </div>
        </div>
        <div class="container bg-white">
            <div class="parent text-center">
                <?php
                    $arhiva = 1;
                    $category = "World";
                    $query = "SELECT * FROM vijesti WHERE kategorija = ? AND arhiva = ?;";
                    $stmt = mysqli_stmt_init($dbc);
                    if (!mysqli_stmt_prepare($stmt, $query)) {
                        echo "failed";
                    } else {
                        mysqli_stmt_bind_param($stmt, "si", $category, $arhiva);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "
                                <div class='child'>
                                    <a href='./clanak.php?id=${row['id']}'>
                                        <img src='../images/${row['slika']}' alt='${row['slika']}'>
                                        <h4>${row['naslov']}</h4>
                                    </a>
                                </div>
                            ";
                        }
                    }
                ?>
            </div>
        </div>
    </article>
    <?php require 'footer.php'?>
    <?php
        mysqli_close($dbc);
    ?>
</body>
</html>