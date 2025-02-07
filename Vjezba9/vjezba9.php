<?php
function ducan($stanje = "otvoren") {
    echo "Ducan je $stanje";
}

function provjeriRadnoVrijeme() {
    $trenutnoVrijeme = new DateTime();
    $danUTjednu = $trenutnoVrijeme->format('l');  // Dohvatimo trenutni dan u tjednu
    $sati = $trenutnoVrijeme->format('H'); // Dohvatimo trenutni sat

    // Definiramo praznike, datum format je "Y-m-d"
    $praznici = [
        "2025-01-01", // Nova godina
        "2025-04-10", // Uskrs
        "2025-06-22", // Dan antifašističke borbe
        "2025-08-05", // Dan pobjede
        "2025-12-25"  // Božić
    ];

    $trenutniDatum = $trenutnoVrijeme->format('Y-m-d');

    // Provjera ako je trenutni datum praznik
    if (in_array($trenutniDatum, $praznici)) {
        ducan("zatvoren");
        return;
    }

    // Provjera da li je nedjelja
    if ($danUTjednu == "Sunday") {
        ducan("zatvoren");
        return;
    }

    // Provjera da li je subota
    if ($danUTjednu == "Saturday") {
        // Subotom je radno vrijeme od 9 do 14
        if ($sati >= 9 && $sati < 14) {
            ducan("otvoren");
        } else {
            ducan("zatvoren");
        }
        return;
    }

    // Za ostale dane, radno vrijeme je od 8 do 20
    if ($sati >= 8 && $sati < 20) {
        ducan("otvoren");
    } else {
        ducan("zatvoren");
    }
}

// Pozivanje funkcije
provjeriRadnoVrijeme();
?>
