<?php
// Generiranje nasumičnog broja između 1 i 9
$zamisljeniBroj = rand(1, 9);
$poruka = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $korisnikovBroj = isset($_POST['broj']) ? (int)$_POST['broj'] : 0;

    if ($korisnikovBroj === $zamisljeniBroj) {
        $poruka = "Čestitamo! Pogodili ste zamišljeni broj ($zamisljeniBroj).";
    } else {
        $poruka = "Nažalost, pogrešno. Zamišljeni broj je bio $zamisljeniBroj.";
    }
}

echo "<!DOCTYPE html>\n";
echo "<html lang=\"hr\">\n";
echo "<head>\n";
echo "    <meta charset=\"UTF-8\">\n";
echo "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n";
echo "    <meta name=\"description\" content=\"Pogodite zamišljeni broj između 1 i 10 koristeći PHP.\">\n";
echo "    <meta name=\"keywords\" content=\"broj, igra, rand, PHP\">\n";
echo "    <title>Pogodi broj</title>\n";
echo "</head>\n";
echo "<body>\n";
echo "    <h1>Pogodi zamišljeni broj</h1>\n";
echo "    <form method=\"post\">\n";
echo "        <label for=\"broj\">Unesite broj između 1 i 10:</label>\n";
echo "        <input type=\"number\" name=\"broj\" id=\"broj\" min=\"1\" max=\"9\" required>\n";
echo "        <br>\n";
echo "        <button type=\"submit\">Pogodi</button>\n";
echo "    </form>\n";

if (!empty($poruka)) {
    echo "    <p>$poruka</p>\n";
}

echo "</body>\n";
echo "</html>";
?>
