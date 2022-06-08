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
                <a href="#U.S.">
                    <div class="m-2">
                        U.S.
                    </div>
                </a>
            </div>
            <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-12 col-sm-12 fs-5 fw-bold">
                <a href="#World">
                    <div class="m-2">
                        World
                    </div>
                </a>
            </div>
            <div class="col-xxl-2 col-xl-3 col-lg-12 col-md-12 col-sm-12 fs-5 fw-bold">
                <a href="#Administracija">
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
    <main>
        <div class="container text-center">
            <div class="row">
                <div class="col d-flex justify-content-center m-4">
                    <!-- action="./skripta.php" -->
                        <form method="post" class="p-4 bg-white"> 
                        <div class="form-item">
                            <label>Naslov vijesti</label>
                            <div class="form-field">
                                <input type="text" name="title" class="form-field-textual" required>
                            </div>
                        </div>
                        <div class="form-item">
                            <label>Datum objave</label>
                            <div class="form-field">
                                <input type="date" name="date" id="date" required>
                            </div>
                        </div>
                        <div class="form-item">
                            <label>Kratki sadržaj vijesti (do 50 znakova)</label>
                            <div class="form-field">
                                <textarea name="about" cols="30" rows="8" required></textarea>
                            </div>
                        </div>
                        <div class="form-item">
                            <label>Sadržaj vijesti</label>
                            <div class="form-field">
                                <textarea name="content" cols="30" rows="8" class="form-field-textual" required></textarea>
                            </div>
                        </div>
                        <div class="form-item">
                            <label>Slika:</label>
                            <div class="form-field">
                                <input type="file" name="slika" required>
                            </div>
                        </div>
                        <div class="form-item">
                            <label>Kategorija vijesti</label>
                            <div class="form-field">
                                <select name="category" class="form-field-textual" required>
                                    <option value="">Odabir kategorije</option>
                                    <option value="U.S.">U.S.</option>
                                    <option value="World">World</option>
                                    <option value="Politics">Politics</option>
                                    <option value="Sport">Sport</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-item">
                            <label>Spremiti u arhivu:</label>
                            <div class="form-field">
                                <input type="checkbox" name="archive">
                            </div>
                        </div>
                        <div class="form-item">
                            <button type="reset" value="Poništi" class="bg-white">Poništi</button>
                            <button type="submit" value="Prihvati" class="bg-white">Prihvati</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="container bg-white mt-1 p-4">
            <div class="row">
                <div class="col">
                    &copy; 2022 NEWSWEEK
                </div>
            </div>
        </div>
    </footer>
    <?php
        include 'connect.php';
        if (!empty($_POST['date']) && !empty($_POST['title']) && !empty($_POST['about']) && !empty($_POST['content']) && !empty($_POST['slika']) && !empty($_POST['category'])) {
            $datum = $_POST['date'];
            $naslov = $_POST['title'];
            $sazetak = $_POST['about'];
            $tekst = $_POST['content'];
            $slika = $_POST['slika'];
            $kategorija = $_POST['category'];
            if (isset($_POST['archive'])) $arhiva = 1;
            else $arhiva = 0;
            echo "$datum<br>";
            echo "$naslov<br>";
            echo "$sazetak<br>";
            echo "$tekst<br>";
            echo "$slika<br>";
            echo "<img src='$slika' alt=''>";
            echo "$kategorija<br>";
            echo "$arhiva<br>";
            $query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES ('$datum', '$naslov', '$sazetak', '$tekst', '$slika', '$kategorija', '$arhiva')";
            $result = mysqli_query($dbc, $query) or die('Error querying database.');
        }
        // $query = "SELECT * FROM vijesti";
        // $result = mysqli_query($dbc, $query);
        // while ($row = mysqli_fetch_array($result)) {
        //     echo "${row['id']} ";
        //     echo date('d/m/o', strtotime($row['datum'])) . " ";
        //     echo "${row['naslov']} ";
        //     echo "${row['sazetak']} ";
        //     echo "${row['tekst']} ";
        //     echo "${row['slika']} ";
        //     echo "<img src='${row['slika']}' alt='slika' width='100px'>";
        //     $s = "photos/" . $row['slika'];
        //     echo "<img src='$s' alt='slika' width='100px'>";
        //     echo "<img src='${row['slika']}' alt='slika' width='100px'>";
        //     echo "${row['kategorija']} ";
        //     echo "${row['arhiva']}<br>";
        // }
        mysqli_close($dbc);
    ?>
</body>
</html>