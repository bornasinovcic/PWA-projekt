document.getElementById("submit").onclick = function(event) {
    var slanje = true;
    var lozinka = document.getElementById("lozinka").value;
    var lozinka_ponovo = document.getElementById("lozinka_ponovo").value;
    var lozinkaBorder = document.getElementById("lozinka");
    var lozinka_ponovoBorder = document.getElementById("lozinka_ponovo");
    if (lozinka.localeCompare(lozinka_ponovo)) {
        slanje = false;
        document.getElementById("lozinkaPoruka").innerHTML = "lozinke se ne poklapaju<br>";
        document.getElementById("lozinkaPoruka").style.color = "red";
        lozinkaBorder.style.border = "1px solid red";
        lozinka_ponovoBorder.style.border = "1px solid red";
    } else {
        document.getElementById("lozinkaPoruka").innerHTML = "";
        lozinkaBorder.style.border = "1px solid black";
        lozinka_ponovoBorder.style.border = "1px solid black";
    }
    if (slanje != true) {
        event.preventDefault();
    }
}