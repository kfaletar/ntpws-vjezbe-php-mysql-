<?php
// Funkcija koja provjerava je li broj prost
function jeProst($broj) {
    if ($broj <= 1) {
        return false; // Brojevi manji ili jednaki 1 nisu prosti
    }
    for ($i = 2; $i <= sqrt($broj); $i++) {
        if ($broj % $i == 0) {
            return false; // Ako je broj deljiv sa $i, nije prost
        }
    }
    return true; // Ako nije deljiv ni sa jednim brojem osim 1 i samog sebe, prost je
}

// Provjera je li obrazac poslan i postoji li uneseni broj
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['broj'])) {
    $broj = $_POST['broj'];
    $rezultat = jeProst($broj) ? "je prost broj." : "nije prost broj.";
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provjera Prostog Broja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h1>Provjeri Je Li Broj Prost</h1>
        
        <!-- Forma za unos broja -->
        <form method="POST" action="">
            <label for="broj">Unesite broj:</label>
            <input type="number" id="broj" name="broj" required>
            <button type="submit">Provjeri</button>
        </form>

        <!-- Ispis rezultata -->
        <?php
        if (isset($rezultat)) {
            echo "<p>Broj $broj $rezultat</p>";
        }
        ?>

        <h2>Prosti brojevi manji od 100:</h2>
        <ul>
            <?php
            // Ispis svih prostih brojeva manjih od 100
            for ($i = 2; $i < 100; $i++) {
                if (jeProst($i)) {
                    echo "<li>$i</li>";
                }
            }
            ?>
        </ul>
    </div>
</body>
</html>
