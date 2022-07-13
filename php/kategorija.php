<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once '../html/head.html'?>
</head>
<body>
    <?php require_once 'header.php'?>
    <?php require_once '../html/navigation.html'?>
    <article>
        <div class="container bg-white mt-1">
            <div class="row">
                <div class="col fs-5 fw-bold text-danger mb-1 mt-1">
                    <?php
                        echo $_GET['category'];
                    ?>
                </div>
            </div>
        </div>
        <div class="container bg-white">
            <div class="row text-center">
                <?php
                    include 'connect.php';
                    $arhiva = 0;
                    $category = $_GET['category'];
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
                                <div class='col-xxl-4 col-sm-12'>
                                    <a href='./clanak.php?id=${row['id']}'>
                                        <img src='../images/${row['slika']}' alt='${row['slika']}' style='height: 260px;'>
                                        <h4>${row['naslov']}</h4>
                                    </a>
                                </div>
                            ";
                        }
                    }
                    mysqli_close($dbc);
                ?>
            </div>
        </div>
    </article>
    <?php require_once 'footer.php'?>
</body>
</html>