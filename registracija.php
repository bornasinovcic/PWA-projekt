<!DOCTYPE html>
<html lang="en">
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
                    <h6 class="text-start"><?php echo date('D, M j, Y')?></h6>
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
                        include 'connect.php';
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
                    <script>
                        document.getElementById("submit").onclick = function(event) {
                            var slanje = true;
                            var lozinka = document.getElementById("lozinka").value;
                            var lozinka_ponovo = document.getElementById("lozinka_ponovo").value;
                            var lozinkaBorder = document.getElementById("lozinka");
                            if (lozinka.localeCompare(lozinka_ponovo)) {
                                slanje = false;
                                document.getElementById("lozinkaPoruka").innerHTML = "lozinke se ne poklapaju<br>";
                                document.getElementById("lozinkaPoruka").style.color = "red";
                                lozinkaBorder.style.border = "1px solid red";
                            } else {
                                document.getElementById("lozinkaPoruka").innerHTML = "";
                                lozinkaBorder.style.border = "1px solid black";
                            }
                            if (slanje != true) {
                                event.preventDefault();
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </article>
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