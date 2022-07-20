<!DOCTYPE html>
<html lang="en">
<head>
    <?php require '../html/head.html'?>
</head>
<body>
    <?php require 'header.php'?>
    <?php require '../html/navigation.html'?>
    <article>
        <div class="container text-center">
            <div class="row">
                <div class="col d-flex justify-content-center m-4">
                    <form method="post" class="p-4 bg-white">
                        Ime:<br><input type="text" name="ime" id="ime" required><br>
                        Prezime:<br><input type="text" name="prezime" id="prezime" required><br>
                        Korisničko ime:<br><input type="text" name="korisnicko_ime" id="korisnicko_ime" required><br>
                        Lozinka:<br><input type="password" name="lozinka" id="lozinka" required><br>
                        Ponovite lozinku:<br><input type="password" name="lozinka_ponovo" id="lozinka_ponovo" required><hr>
                        <span id="lozinkaPoruka"></span>
                        <button type="reset" value="reset" name="gumb" class="bg-white">Reset</button>
                        <button type="submit" value="submit" name="gumb" class="bg-white" id="submit">Submit</button>
                    </form>
                    <?php
                        require 'connect.php';
                        if (
                            !empty($_POST['ime']) &&
                            !empty($_POST['prezime']) &&
                            !empty($_POST['korisnicko_ime']) &&
                            !empty($_POST['lozinka']) &&
                            !empty($_POST['lozinka_ponovo'])
                        )
                        {
                            $ime = $_POST['ime'];
                            $prezime = $_POST['prezime'];
                            $korisnicko_ime = $_POST['korisnicko_ime'];
                            if (strcmp($_POST['lozinka'], $_POST['lozinka_ponovo']) === 0) {
                                $lozinka = $_POST['lozinka'];
                                $hashed_lozinka = password_hash($lozinka, CRYPT_BLOWFISH);
                                $razina = 0;
                                $query="INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) values (?, ?, ?, ?, ?)";
                                $stmt = mysqli_stmt_init($dbc);
                                if (mysqli_stmt_prepare($stmt, $query)) {
                                    mysqli_stmt_bind_param($stmt, 'ssssi', $ime, $prezime, $korisnicko_ime, $hashed_lozinka, $razina);
                                    mysqli_stmt_execute($stmt);
                                }                
                            }

                        }
                        mysqli_close($dbc);
                    ?>
                </div>
            </div>
        </div>
    </article>
    <?php require 'footer.php'?>
    <script src="../js/registracija.js"></script>
</body>
</html>