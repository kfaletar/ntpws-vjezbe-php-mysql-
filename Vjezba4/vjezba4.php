<?php
$a = $b = $c = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a = isset($_POST['a']) ? (float)$_POST['a'] : 0;
    $b = isset($_POST['b']) ? (float)$_POST['b'] : 0;
    $c = (3 * $a - $b) / 2;
}

echo "<!DOCTYPE html>\n";
echo "<html lang=\"hr\">\n";
echo "<head>\n";
echo "    <meta charset=\"UTF-8\">\n";
echo "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n";
echo "    <meta name=\"description\" content=\"Izračun vrijednosti varijable c pomoću formule c = (3a - b) / 2.\">\n";
echo "    <meta name=\"keywords\" content=\"formula, izračun, varijable, PHP\">\n";
echo "    <title>Izračun varijable c</title>\n";
echo "</head>\n";
echo "<body>\n";
echo "    <h1>Izračun varijable c</h1>\n";
echo "    <form method=\"post\">\n";
echo "        <label for=\"a\">Unesite vrijednost za a:</label>\n";
echo "        <input type=\"number\" step=\"0.01\" name=\"a\" id=\"a\" required value=\"" . htmlspecialchars($a) . "\">\n";
echo "        <br>\n";
echo "        <label for=\"b\">Unesite vrijednost za b:</label>\n";
echo "        <input type=\"number\" step=\"0.01\" name=\"b\" id=\"b\" required value=\"" . htmlspecialchars($b) . "\">\n";
echo "        <br>\n";
echo "        <button type=\"submit\">Izračunaj</button>\n";
echo "    </form>\n";

if ($c !== null) {
    echo "    <h2>Rezultat</h2>\n";
    echo "    <p>Vrijednost c za unesene vrijednosti a = $a i b = $b je: $c</p>\n";
}

echo "</body>\n";
echo "</html>";
?>
