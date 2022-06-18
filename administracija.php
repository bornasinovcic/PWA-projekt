<!DOCTYPE html>
<html lang='zxx'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor' crossorigin='anonymous'>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@900&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='./style.css'>
</head>
<body>
    <header>
        <div class='container'>
            <div class='row'>
                <div class='col text-center text-white naslov'>
                    <h1 class='display-1'>Newsweek</h1>
                    <h6 class='text-start'><?php echo date('D, M j, Y')?></h6>
                </div>
            </div>
        </div>
    </header>
    <div class='container bg-white text-center'>
        <div class='row'>
            <div class='col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 fs-5 fw-bold'>
                <a href='./index.php'>
                    <div class='m-2'>
                        Home
                    </div>
                </a>
            </div>
            <div class='col-xxl-2 col-xl-3 col-lg-4 col-md-6 col-sm-12 fs-5 fw-bold'>
                <a href='./kategorija.php?category=U.S.'>
                    <div class='m-2'>
                        U.S.
                    </div>
                </a>
            </div>
            <div class='col-xxl-2 col-xl-3 col-lg-4 col-md-12 col-sm-12 fs-5 fw-bold'>
                <a href='./kategorija.php?category=World'>
                    <div class='m-2'>
                        World
                    </div>
                </a>
            </div>
            <div class='col-xxl-2 col-xl-3 col-lg-12 col-md-12 col-sm-12 fs-5 fw-bold'>
                <a href='./administracija.php'>
                    <div class='m-2'>
                        Administracija
                    </div>
                </a>
            </div>
            <div class='col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 fs-5 fw-bold'>
                <a href='./unos.php'>
                    <div class='m-2'>
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
                    <form method="post" class="p-4 bg-white">
                        Korisnicko ime:<br><input type="text" name="korisnicko_ime" id="korisnicko_ime" required><br>
                        Lozinka:<br><input type="password" name="lozinka" id="lozinka" required><hr>
                        <button type='submit' value='login' name='gumb' class='bg-white'>Sign in</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
            include 'connect.php';
            $login = FALSE;
            if (isset($_POST['gumb'])) {
                if (strcmp($_POST['gumb'], 'login') === 0) {
                    $korisnicko_ime = $_POST['korisnicko_ime'];
                    $lozinka = $_POST['lozinka'];
                    $query = "SELECT * FROM korisnik WHERE korisnicko_ime = ?;";
                    $stmt = mysqli_stmt_init($dbc);
                    if (!mysqli_stmt_prepare($stmt, $query)) {
                        echo "failed";
                    } else {
                        mysqli_stmt_bind_param($stmt, "s", $korisnicko_ime);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $row = mysqli_fetch_assoc($result);
                        if (isset($row['lozinka'])) {
                            if (password_verify($lozinka, $row['lozinka'])) {
                                $login = TRUE;
                            }
                        }
                    }
                    if ($login) {
                        echo "
                            <div class='container text-center'>
                                <div class='row'>
                                    <div class='col d-flex flex-column justify-content-center m-4'>
                                        <form method='post' class='bg-white p-4 mb-5'>
                                            Unesite id od članka koji želite izbrisati
                                            <br><input type='number' name='id' id='id' required><hr>
                                            <button type='submit' value='Brisanje' name='gumb' class='bg-white'>Brisanje</button>
                                        </form>
                                        <form method='post' class='bg-white p-4 mb-5'>
                                            <div class='form-item'>
                                                Unesite id od članka koji želite izmjeniti
                                                <br><input type='number' name='id' id='id' required>
                                            </div>
                                            <div class='form-item'>
                                                <label>Naslov vijesti</label>
                                                <div class='form-field'>
                                                    <input type='text' name='title' class='form-field-textual' required>
                                                </div>
                                            </div>
                                            <div class='form-item'>
                                                <label>Datum objave</label>
                                                <div class='form-field'>
                                                    <input type='date' name='date' id='date' required>
                                                </div>
                                            </div>
                                            <div class='form-item'>
                                                <label>Kratki sadržaj vijesti (do 50 znakova)</label>
                                                <div class='form-field'>
                                                    <textarea name='about' cols='30' rows='8' required></textarea>
                                                </div>
                                            </div>
                                            <div class='form-item'>
                                                <label>Sadržaj vijesti</label>
                                                <div class='form-field'>
                                                    <textarea name='content' cols='30' rows='8' class='form-field-textual' required></textarea>
                                                </div>
                                            </div>
                                            <div class='form-item'>
                                                <label>Slika:</label>
                                                <div class='form-field'>
                                                    <input type='file' name='slika' required>
                                                </div>
                                            </div>
                                            <div class='form-item'>
                                                <label>Kategorija vijesti</label>
                                                <div class='form-field'>
                                                    <select name='category' class='form-field-textual' required>
                                                        <option value=''>Odabir kategorije</option>
                                                        <option value='U.S.'>U.S.</option>
                                                        <option value='World'>World</option>
                                                        <option value='Politics'>Politics</option>
                                                        <option value='Sport'>Sport</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='form-item'>
                                                <label>Spremiti u arhivu:</label>
                                                <div class='form-field'>
                                                    <input type='checkbox' name='archive'>
                                                </div>
                                            </div><hr>
                                            <div class='form-item'>
                                                <button type='reset' value='Poništi' name='gumb' class='bg-white'>Brisanje</button>
                                                <button type='submit' value='Izmjena' name='gumb' class='bg-white'>Izmjena</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        ";
                    } else {
                        echo "
                            <div class='container text-center'>
                                <div class='row'>
                                    <div class='col d-flex justify-content-center m-4'>
                                        <form method='post' class='p-4 bg-white'>
                                            <button type='submit' class='bg-white'><a href='./registracija.php'>Registrirajte se</a></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                }
            }
            mysqli_close($dbc);
        ?>
    </main>
    <footer>
        <div class='container bg-white mt-1 p-4'>
            <div class='row'>
                <div class='col'>
                    &copy; 2022 NEWSWEEK
                </div>
            </div>
        </div>
    </footer>
    <?php
        include 'connect.php';
        if (isset($_POST['gumb'])) {
            if (strcmp($_POST['gumb'], 'Brisanje') === 0) {
                $id = $_POST['id'];
                $query = 'DELETE FROM vijesti WHERE id = ?;';
                $stmt = mysqli_stmt_init($dbc);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    echo "failed";
                } else {
                    mysqli_stmt_bind_param($stmt, "i", $id);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }            
            } elseif (strcmp($_POST['gumb'], 'Izmjena') === 0) {
                $id = $_POST['id'];
                $datum = $_POST['date'];
                $naslov = $_POST['title'];
                $sazetak = $_POST['about'];
                $tekst = $_POST['content'];
                $slika = $_POST['slika'];
                $kategorija = $_POST['category'];
                if (isset($_POST['archive'])) $arhiva = 1;
                else $arhiva = 0;
                $query = 'UPDATE vijesti SET datum = ?, naslov = ?, sazetak = ?, tekst = ?, slika = ?, kategorija = ?, arhiva = ? WHERE id = ?';
                $stmt = mysqli_stmt_init($dbc);
                if (mysqli_stmt_prepare($stmt, $query)) {
                    mysqli_stmt_bind_param($stmt, 'ssssssii', $datum, $naslov, $sazetak, $tekst, $slika, $kategorija, $arhiva, $id);
                    mysqli_stmt_execute($stmt);
                }
            }
        }
        mysqli_close($dbc);
    ?>
</body>
</html>