<?php
// Funkcija za prebrojavanje riječi u rečenici
function prebrojRijeci($rečenica) {
    // Koristimo str_word_count() funkciju koja broji broj riječi u rečenici
    $brojRijeci = str_word_count($rečenica);
    return $brojRijeci;
}

// Provjeravamo je li obrazac poslan i postoji li unesena rečenica
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['rečenica'])) {
    $rečenica = $_POST['rečenica'];
    $brojRijeci = prebrojRijeci($rečenica); // Pozivamo funkciju za prebrojavanje
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prebrojavanje Riječi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h1>Prebrojavanje Riječi</h1>
        
        <!-- Forma za unos rečenice -->
        <form method="POST" action="">
            <label for="rečenica">Unesite rečenicu:</label>
            <textarea id="rečenica" name="rečenica" rows="4" cols="50" required></textarea>
            <button type="submit">Prebroj riječi</button>
        </form>

        <!-- Ispis rezultata -->
        <?php
        if (isset($brojRijeci)) {
            echo "<p>Broj riječi u rečenici: $brojRijeci</p>";
        }
        ?>
    </div>
</body>
</html>
