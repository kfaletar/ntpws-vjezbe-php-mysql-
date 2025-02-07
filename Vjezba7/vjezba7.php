<?php
    $prosjek = "";
    $konacna_ocjena = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $kolokvij1 = $_POST['kolokvij1'];
        $kolokvij2 = $_POST['kolokvij2'];

        // Provjera da li su oba kolokvija pozitivna
        if ($kolokvij1 < 1 || $kolokvij1 > 5 || $kolokvij2 < 1 || $kolokvij2 > 5) {
            $prosjek = "Ocjene moraju biti između 1 i 5.";
        } elseif ($kolokvij1 < 2 || $kolokvij2 < 2) {
            $konacna_ocjena = "Konačna ocjena je negativna jer je jedan kolokvij negativan.";
        } else {
            $prosjek = ($kolokvij1 + $kolokvij2) / 2;
            $konacna_ocjena = "Prosjek: " . round($prosjek, 2);

            // Izračun konačne ocjene
            if ($prosjek >= 4.5) {
                $konacna_ocjena .= " - Ocjena: 5";
            } elseif ($prosjek >= 3.5) {
                $konacna_ocjena .= " - Ocjena: 4";
            } elseif ($prosjek >= 2.5) {
                $konacna_ocjena .= " - Ocjena: 3";
            } else {
                $konacna_ocjena .= " - Ocjena: 2";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unos Ocjena</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h1>Unos Ocjena</h1>
        <form method="POST" action="">
            <label for="kolokvij1">Ocjena I. kolokvija:</label>
            <input type="number" id="kolokvij1" name="kolokvij1" min="1" max="5" required>

            <label for="kolokvij2">Ocjena II. kolokvija:</label>
            <input type="number" id="kolokvij2" name="kolokvij2" min="1" max="5" required>

            <button type="submit">Izračunaj Prosjek</button>
        </form>

        <div id="rezultat" class="rezultat">
            <?php
                if ($prosjek != "") {
                    echo "<p>$prosjek</p>";
                }
                if ($konacna_ocjena != "") {
                    echo "<p>$konacna_ocjena</p>";
                }
            ?>
        </div>
    </div>
</body>
</html>
