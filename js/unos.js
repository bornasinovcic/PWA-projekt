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