<?php
    include 'connect.php';
    if (!empty($_FILES["picture"]["name"])) {
        $target_file = "images/" . basename($_FILES["picture"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (isset($_POST["button"])) {
            $check = getimagesize($_FILES["picture"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".<br>";
                $uploadOk = 1;
            } else {
                echo "File is not an image.<br>";
                $uploadOk = 0;
            }
        }
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.<br>";
            $uploadOk = 0;
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.<br>";
        } else {
            if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                // echo "The file " . htmlspecialchars(basename($_FILES["picture"]["name"])) . " has been uploaded.<br>";
            } else {
                // echo "Sorry, there was an error uploading your file.<br>";
            }
        }
    }
    if (
        !empty($_POST['date']) &&
        !empty($_POST['title']) &&
        !empty($_POST['about']) &&
        !empty($_POST['content']) &&
        !empty($_FILES["picture"]["name"]) &&
        !empty($_POST['category'])
    )
    {
        $datum = $_POST['date'];
        $naslov = $_POST['title'];
        $sazetak = $_POST['about'];
        $tekst = $_POST['content'];
        $slika = $_FILES["picture"]["name"];
        $kategorija = $_POST['category'];
        if (isset($_POST['archive'])) $arhiva = 1;
        else $arhiva = 0;
        $query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES (?, ?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, 'ssssssi', $datum, $naslov, $sazetak, $tekst, $slika, $kategorija, $arhiva);
            mysqli_stmt_execute($stmt);
        }
    }
    mysqli_close($dbc);
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php require_once '../html/head.html'?>
</head>
<body>
    <?php require_once 'header.php'?>
    <?php require_once '../html/navigation.html'?>
    <section role="main">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <p class="category text-decoration-underline"><?php echo $kategorija;?></p>
                        <h1><?php echo $naslov;?></h1>
                        <p>AUTOR:</p>
                        <p>
                            OBJAVLJENO:
                            <?php echo date('d/m/o', strtotime($datum));?>
                        </p>
                    </div>
                    <section class="slika">
                        <?php echo "<img src='images/$slika'";?>
                    </section>
                    <section class="about">
                        <p><?php echo $sazetak;?></p>
                    </section>
                    <section class="sadrzaj">
                        <p><?php echo $tekst;?></p>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <?php require_once 'footer.php'?>
</body>
</html>