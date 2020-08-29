function kekata(n) {
    var angka = new Array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    var tbr;

    if (n < 12) {
        tbr = "" + angka[n]
    } else if (n < 20) {
        tbr = kekata(Math.floor(n - 10)) + " Belas";
    } else if (n < 100) {
        tbr = kekata(Math.floor(n / 10)) + " Puluh" + kekata(n % 10);
    } else if (n < 200) {
        tbr = " Seratus" + kekata(n - 100);
    }
    return tbr;
}

function terbilang(a, b) {
    document.getElementById(b).innerText = kekata(a.value);
}