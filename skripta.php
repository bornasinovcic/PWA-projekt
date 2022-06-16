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
    if (!empty($_POST['date']) && !empty($_POST['title']) && !empty($_POST['about']) && !empty($_POST['content']) && !empty($_FILES["picture"]["name"]) && !empty($_POST['category'])) {
        $datum = $_POST['date'];
        $naslov = $_POST['title'];
        $sazetak = $_POST['about'];
        $tekst = $_POST['content'];
        $slika = $_FILES["picture"]["name"];
        $kategorija = $_POST['category'];
        if (isset($_POST['archive'])) $arhiva = 1;
        else $arhiva = 0;
        $query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES ('$datum', '$naslov', '$sazetak', '$tekst', '$slika', '$kategorija', '$arhiva')";
        $result = mysqli_query($dbc, $query) or die('Error querying database.');
    }
    mysqli_close($dbc);
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col text-center text-white naslov">
                    <h1 class="display-1">Newsweek</h1>
                </div>
            </div>
        </div>
    </header>
    <div class="container bg-white text-center">
        <div class="row">
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 fs-5 fw-bold">
                <a href="./index.php">
                    <div class="m-2">
                        Home
                    </div>
                </a>
            </div>
            <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6 col-sm-12 fs-5 fw-bold">
                <a href="./kategorija.php?category=U.S.">
                    <div class="m-2">
                        U.S.
                    </div>
                </a>
            </div>
            <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-12 col-sm-12 fs-5 fw-bold">
                <a href="./kategorija.php?category=World">
                    <div class="m-2">
                        World
                    </div>
                </a>
            </div>
            <div class="col-xxl-2 col-xl-3 col-lg-12 col-md-12 col-sm-12 fs-5 fw-bold">
                <a href="./administracija.php">
                    <div class="m-2">
                        Administracija
                    </div>
                </a>
            </div>
            <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 fs-5 fw-bold">
                <a href="./unos.php">
                    <div class="m-2">
                        Unos
                    </div>
                </a>
            </div>
        </div>
    </div>
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
    <footer>
        <div class="container bg-white mt-1 p-4">
            <div class="row">
                <div class="col">
                    &copy; 2022 NEWSWEEK
                </div>
            </div>
        </div>
    </footer>
</body>
</html>