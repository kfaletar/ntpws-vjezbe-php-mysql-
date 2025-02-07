<?php
// Kalkulator koji koristi switch naredbu
$rezultat = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $broj1 = isset($_POST['broj1']) ? (float)$_POST['broj1'] : 0;
    $broj2 = isset($_POST['broj2']) ? (float)$_POST['broj2'] : 0;
    $operacija = isset($_POST['operacija']) ? $_POST['operacija'] : '';

    switch ($operacija) {
        case 'zbrajanje':
            $rezultat = $broj1 + $broj2;
            break;
        case 'oduzimanje':
            $rezultat = $broj1 - $broj2;
            break;
        case 'mnozenje':
            $rezultat = $broj1 * $broj2;
            break;
        case 'dijeljenje':
            if ($broj2 != 0) {
                $rezultat = $broj1 / $broj2;
            } else {
                $rezultat = "Dijeljenje s nulom nije dozvoljeno.";
            }
            break;
        default:
            $rezultat = "Nepoznata operacija.";
            break;
    }
}

echo "<!DOCTYPE html>\n";
echo "<html lang=\"hr\">\n";
echo "<head>\n";
echo "    <meta charset=\"UTF-8\">\n";
echo "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n";
echo "    <title>Kalkulator</title>\n";
echo "</head>\n";
echo "<body>\n";
echo "    <h1>Kalkulator</h1>\n";
echo "    <form method=\"post\">\n";
echo "        <label for=\"broj1\">Prvi broj:</label>\n";
echo "        <input type=\"number\" step=\"0.01\" name=\"broj1\" id=\"broj1\" required>\n";
echo "        <br>\n";
echo "        <label for=\"broj2\">Drugi broj:</label>\n";
echo "        <input type=\"number\" step=\"0.01\" name=\"broj2\" id=\"broj2\" required>\n";
echo "        <br>\n";
echo "        <label for=\"operacija\">Odaberite operaciju:</label>\n";
echo "        <select name=\"operacija\" id=\"operacija\">\n";
echo "            <option value=\"zbrajanje\">Zbrajanje</option>\n";
echo "            <option value=\"oduzimanje\">Oduzimanje</option>\n";
echo "            <option value=\"mnozenje\">Množenje</option>\n";
echo "            <option value=\"dijeljenje\">Dijeljenje</option>\n";
echo "        </select>\n";
echo "        <br>\n";
echo "        <button type=\"submit\">Izračunaj</button>\n";
echo "    </form>\n";

if ($rezultat !== "") {
    echo "    <h2>Rezultat</h2>\n";
    echo "    <p>Rezultat: $rezultat</p>\n";
}

echo "</body>\n";
echo "</html>";
?>
