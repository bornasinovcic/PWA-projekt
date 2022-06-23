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
    <?php require_once 'header.php'?>
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
    <main>
        <div class="container text-center">
            <div class="row">
                <div class="col d-flex justify-content-center m-4">
                    <form enctype="multipart/form-data" action="./skripta.php" method="post" class="p-4 bg-white">
                        <div class="form-item">
                            <label>Naslov vijesti</label>
                            <div class="form-field">
                                <input type="text" name="title" id="naslov" class="form-field-textual">
                                <span id="porukaNaslov"></span>
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
                                <textarea name="about" cols="30" rows="8" id="shortend-content"></textarea>
                                <span id="porukaKratkiSardzaj"></span>
                            </div>
                        </div>
                        <div class="form-item">
                            <label>Sadržaj vijesti</label>
                            <div class="form-field">
                                <textarea id="content" name="content" cols="30" rows="8" class="form-field-textual"></textarea>
                                <span id="porukaSadrzaj"></span>
                            </div>
                        </div>
                        <div class="form-item">
                            <label>Slika:</label>
                            <div class="form-field">
                                <input type="file" name="picture" id="picture">
                                <span id="porukaSlika"></span>
                            </div>
                        </div>
                        <div class="form-item">
                            <label>Kategorija vijesti</label>
                            <div class="form-field">
                                <select name="category" class="form-field-textual" id="category">
                                    <option value="">Odabir kategorije</option>
                                    <option value="U.S.">U.S.</option>
                                    <option value="World">World</option>
                                    <option value="Politics">Politics</option>
                                    <option value="Sport">Sport</option>
                                </select>
                                <span id="porukaKategorija"></span>
                            </div>
                        </div>
                        <div class="form-item">
                            <label>Spremiti u arhivu:</label>
                            <div class="form-field">
                                <input type="checkbox" name="archive">
                            </div>
                        </div><hr>
                        <div class="form-item">
                            <button type="reset" value="Poništi" class="bg-white">Poništi</button>
                            <button type="submit" value="Prihvati" class="bg-white" id="slanje">Prihvati</button>
                        </div>
                    </form>
                    <script>
                        document.getElementById("slanje").onclick = function(event) {
                            var slanje_forme = true;
                            var naslov = document.getElementById("naslov").value;
                            var polje_za_naslov = document.getElementById("naslov");
                            if (naslov.length < 5 || naslov.length > 30) {
                                slanje_forme = false;
                                document.getElementById("porukaNaslov").innerHTML = "<br>Naslov mora imati više<br>od 5 i manje od 30 znakova";
                                document.getElementById("porukaNaslov").style.color = "red";
                                polje_za_naslov.style.border = "1px solid red";
                            } else {
                                document.getElementById("porukaNaslov").innerHTML = "";
                                polje_za_naslov.style.border = "1px solid black";
                            }
                            var kratki_sardzaj = document.getElementById("shortend-content").value;
                            var polje_za_kratki_sardzaj = document.getElementById("shortend-content");
                            if (kratki_sardzaj.length < 10 || kratki_sardzaj.length > 100) {
                                slanje_forme = false;
                                document.getElementById("porukaKratkiSardzaj").innerHTML = "<br>Kratki sardzaj vijesti mora imati više<br>od 10 i manje od 100 znakova";
                                document.getElementById("porukaKratkiSardzaj").style.color = "red";
                                polje_za_kratki_sardzaj.style.border = "1px solid red";
                            } else {
                                document.getElementById("porukaKratkiSardzaj").innerHTML = "";
                                polje_za_kratki_sardzaj.style.border = "1px solid black";
                            }
                            var tekst = document.getElementById("content").value;
                            var polje_za_tekst = document.getElementById("content");
                            if (tekst.length == 0) {
                                slanje_forme = false;
                                document.getElementById("porukaSadrzaj").innerHTML = "<br>Tekst vijesti nesmije biti prazan";
                                document.getElementById("porukaSadrzaj").style.color = "red";
                                polje_za_tekst.style.border = "1px solid red";
                            } else {
                                document.getElementById("porukaSadrzaj").innerHTML = "";
                                polje_za_tekst.style.border = "1px solid black";
                            }
                            var slika = document.getElementById("picture").value;
                            var polje_za_slika = document.getElementById("picture");
                            if (slika) {
                                document.getElementById("porukaSlika").innerHTML = "";
                                polje_za_slika.style.border = "";
                            } else {
                                slanje_forme = false;
                                document.getElementById("porukaSlika").innerHTML = "<br>Slika mora biti odabrana";
                                document.getElementById("porukaSlika").style.color = "red";
                                polje_za_slika.style.border = "1px solid red";
                            }
                            var kategorija = document.getElementById("category").value;
                            var polje_za_kategorija = document.getElementById("category");
                            if (kategorija) {
                                document.getElementById("porukaKategorija").innerHTML = "";
                                polje_za_kategorija.style.border = "1px solid black";
                            } else {
                                slanje_forme = false;
                                document.getElementById("porukaKategorija").innerHTML = "<br>Kategorija mora biti odabrana";
                                document.getElementById("porukaKategorija").style.color = "red";
                                polje_za_kategorija.style.border = "1px solid red";
                            }
                            if (slanje_forme != true) {
                                event.preventDefault();
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </main>
    <?php require_once 'footer.php'?>
</body>
</html>