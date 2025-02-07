<?php
    $selectedCar = ""; // Varijabla za pohranu odabranog vozila
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Spremamo odabrano vozilo iz obrasca
        if (isset($_POST['vozilo'])) {
            $selectedCar = $_POST['vozilo'];
        }
    }

    // Lista vozila
    $cars = array("Audi", "BMW", "Renault", "Citroen");
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odabir Vozila</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h1>Odaberite Vozilo</h1>
        
        <form method="POST" action="">
            <label for="vozilo">Odaberite vozilo:</label>
            <select id="vozilo" name="vozilo">
                <?php
                    // Generiramo opcije za svaki auto iz liste
                    foreach ($cars as $car) {
                        echo "<option value=\"$car\" " . ($selectedCar == $car ? 'selected' : '') . ">$car</option>";
                    }
                ?>
            </select>
            
            <button type="submit">Odaberi vozilo</button>
        </form>
        
        <div id="rezultat" class="rezultat">
            <?php
                // Ako je korisnik odabrao vozilo, ispisujemo ga
                if ($selectedCar != "") {
                    echo "<p>Odabrali ste vozilo: <strong>$selectedCar</strong></p>";
                }
            ?>
        </div>
    </div>
</body>
</html>
