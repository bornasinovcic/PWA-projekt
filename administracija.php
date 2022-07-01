<?php
    session_start();
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang='zxx'>
<head>
    <?php require_once 'head.html'?>
</head>
<body>
    <?php require_once 'header.php'?>
    <?php require_once 'navigation.html'?>
    <main>
        <div class="container text-center">
            <div class="row">
                <div class="col d-flex justify-content-center m-4">
                    <?php
                        echo "
                            <form method='post' class='p-4 bg-white'>
                                Korisnicko ime:<br><input type='text' name='korisnicko_ime' id='korisnicko_ime' required><br>
                                Lozinka:<br><input type='password' name='lozinka' id='lozinka' required><hr>
                                <button type='submit' value='login' name='gumb' class='bg-white'>Sign in</button>
                            </form>
                        ";
                    ?>
                </div>
            </div>
        </div>
        <?php
            $zavrsi = TRUE;
            if (isset($_POST['korisnicko_ime'], $_POST['lozinka'])) {
                $korisnicko_ime = $_POST['korisnicko_ime'];
                $lozinka = $_POST['lozinka'];
            } else {
                if (isset($_SESSION['$username'], $_SESSION['$lozinka'], $_SESSION['$level'])) {
                    $korisnicko_ime = $_SESSION['$username'];
                    $lozinka = $_SESSION['$lozinka'];
                    $uspjesnaPrijava = TRUE;
                    if ($_SESSION['$level'] == 1) $admin = TRUE;
                    else $admin = FALSE;
                } else {
                    $zavrsi = false;
                }
            }
            if ($zavrsi) {
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
                            if ($row['razina'] === 1) {
                                $uspjesnaPrijava = TRUE;
                                $admin = TRUE;
                                $_SESSION['$username'] = $row['korisnicko_ime'];
                                $_SESSION['$level'] = $row['razina'];
                                $_SESSION['$lozinka'] = $lozinka;
                            } elseif ($row['razina'] === 0) {
                                $uspjesnaPrijava = TRUE;
                                $admin = FALSE;
                                $_SESSION['$username'] = $row['korisnicko_ime'];
                                $_SESSION['$level'] = $row['razina'];
                                $_SESSION['$lozinka'] = $lozinka;
                            }
                        }
                    } else {
                        $uspjesnaPrijava = FALSE;
                        $admin = FALSE;
                        if (isset($_POST['korisnicko_ime'], $_POST['lozinka'])) {
                            $_SESSION['$username'] = $_POST['korisnicko_ime'];
                            // user koji ne postoji ima najmanju razinu administarcije
                            $_SESSION['$level'] = 2;
                            $_SESSION['$lozinka'] = $_POST['lozinka'];
                        }
                    }
                }
                if ($uspjesnaPrijava == TRUE && $admin == TRUE) {
                    echo "
                        <div class='container text-center'>
                            <div class='row'>
                                <div class='col d-flex flex-column justify-content-center m-4'>
                                    <p>Prijavljeni ste kao administrator ${_SESSION['$username']} i imate pravo pristupa admistracijskoj stranici.</p>
                                </div>
                            </div>
                        </div>
                    ";
                    echo "
                        <div class='container text-center'>
                            <div class='row'>
                                <div class='col d-flex flex-column justify-content-center m-4'>
                                    <form method='post' class='bg-white p-4 mb-5'>
                                        Unesite id od članka koji želite izbrisati
                                        <br><input type='number' name='id' id='id' required><hr>
                                        <button type='submit' value='Brisanje' name='gumb' class='bg-white'>Brisanje</button>
                                    </form>
                                    <form enctype='multipart/form-data' method='post' class='bg-white p-4 mb-5'>
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
                } elseif (($uspjesnaPrijava == TRUE && $admin == FALSE)) {
                    echo "
                        <div class='container text-center'>
                            <div class='row'>
                                <div class='col d-flex flex-column justify-content-center m-4'>
                                    <p>Prijavljeni ste kao korisnik ${_SESSION['$username']} i nemate pravo pristupa admistracijskoj stranici.</p>
                                </div>
                            </div>
                        </div>
                    ";
                } elseif (($uspjesnaPrijava == FALSE)) {
                    echo "
                        <div class='container text-center'>
                            <div class='row'>
                                <div class='col d-flex flex-column justify-content-center m-4'>
                                    <p>Taj korisnik ne postoji u bazi podataka.</p>
                                    <p>Stisnite na gumb kako biste se registrirali.</p>
                                </div>
                            </div>
                        </div>
                    ";
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
            mysqli_close($dbc);
        ?>
    </main>
    <?php require_once 'footer.php'?>
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
                if (!empty($_FILES["slika"]["name"])) {
                    $target_file = "images/" . basename($_FILES["slika"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    if (isset($_POST["gumb"])) {
                        $check = getimagesize($_FILES["slika"]["tmp_name"]);
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
                        if (move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
                            // echo "The file " . htmlspecialchars(basename($_FILES["slika"]["name"])) . " has been uploaded.<br>";
                        } else {
                            // echo "Sorry, there was an error uploading your file.<br>";
                        }
                    }
                }
                $id = $_POST['id'];
                $datum = $_POST['date'];
                $naslov = $_POST['title'];
                $sazetak = $_POST['about'];
                $tekst = $_POST['content'];
                $slika = $_FILES["slika"]["name"];
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