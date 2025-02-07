<?php
// PHP blok započinje ovdje
$title = "Da Vincijev kod";
$link = "https://hr.wikipedia.org/" . str_replace(' ', '_', $title);

echo "<!DOCTYPE html>\n";
echo "<html lang=\"hr\">\n";
echo "<head>\n";
echo "    <meta charset=\"UTF-8\">\n";
echo "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n";
echo "    <meta name=\"description\" content=\"Stranica o knjizi '$title' autora Dana Browna.\">\n";
echo "    <meta name=\"keywords\" content=\"$title, knjiga, Dan Brown, kriminalistički triler\">\n";
echo "    <title>$title</title>\n";
echo "</head>\n";
echo "<body>\n";
echo "    <h1>$title</h1>\n";
echo "    <p>$title je kriminalistički triler američkog pisca Dana Browna.</p>\n";
echo "    <p>\n";
echo "        <a href=\"$link\" target=\"_blank\">Više informacija na Wikipediji</a>\n";
echo "    </p>\n";
echo "</body>\n";
echo "<!-- Naziv dokumenta: da_vincijev_kod.html -->\n";
echo "</html>";
?>
