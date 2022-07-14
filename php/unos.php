<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php require '../html/head.html'?>
</head>
<body>
    <?php require 'header.php'?>
    <?php require '../html/navigation.html'?>
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
                </div>
            </div>
        </div>
    </main>
    <?php require 'footer.php'?>
    <script src="../js/script.js"></script>
</body>
</html>