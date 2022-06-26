<?php
    include 'connect.php';
    $id = $_GET['id'];
    $query = "SELECT * FROM vijesti WHERE id = ?;";
    $stmt = mysqli_stmt_init($dbc);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        echo "failed";
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
    }
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php require_once 'head.php'?>
</head>
<body>
    <?php require_once 'header.php'?>
    <?php require_once 'navigation.php'?>
    <section>
        <div class="container bg-white mt-1">
            <div class="row">
                <div class="col fs-5 fw-bold text-danger mb-1 mt-1">
                    <?php echo "${row['kategorija']}"?></h2>
                </div>
            </div>
        </div>
        <div class="container bg-white">
            <div class="row">
                <div class="col">
                    <h2><?php echo "${row['naslov']}"?></h2>
                    <p><?php echo date('d/m/o', strtotime($row['datum']))?></p>
                    <?php echo "<img src='./images/${row['slika']}' alt='${row['slika']}'>"?>
                    <div class="text-white mt-3 mb-3 p-2 subtitle">
                        <?php echo "${row['kategorija']}"?></h2>
                    </div>
                    <p>
                        <?php echo "${row['tekst']}"?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <?php require_once 'footer.php'?>
    <?php
        mysqli_close($dbc);
    ?>
</body>
</html>