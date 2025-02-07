<?php
// Povezivanje s bazom podataka
$conn = new mysqli("localhost", "root", "", "ntpws");
if ($conn->connect_error) {
    die("Povezivanje nije uspjelo: " . $conn->connect_error);
}

// Provjera je li forma poslana
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Podaci iz forme
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Šifriranje lozinke
    $country_id = $_POST['country'];

    // SQL upit za unos korisnika
    $sql = "INSERT INTO users (first_name, last_name, email, username, password, country_id) 
            VALUES (?, ?, ?, ?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssi", $first_name, $last_name, $email, $username, $password, $country_id);

        // Provjera uspješnosti unosa
        if ($stmt->execute()) {
            echo "Registracija uspješna!";
        } else {
            echo "Greška: " . $stmt->error;
        }

        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: green;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="vjezba16.php" method="POST">
        <h2>Registration Form</h2>

        <label for="first_name">First Name *</label>
        <input type="text" name="first_name" id="first_name" required>
        
        <label for="last_name">Last Name *</label>
        <input type="text" name="last_name" id="last_name" required>
        
        <label for="email">Your E-mail *</label>
        <input type="email" name="email" id="email" required>
        
        <label for="username">Username (5-10 characters) *</label>
        <input type="text" name="username" id="username" required minlength="5" maxlength="10">
        
        <label for="password">Password (min 4 characters) *</label>
        <input type="password" name="password" id="password" required minlength="4">
        
        <label for="country">Country *</label>
        <select name="country" id="country" required>
            <option value="">Please select</option>
            <?php
            // Dohvat država iz baze
            $result = $conn->query("SELECT id, country_name FROM country");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['country_name'] . "</option>";
            }
            ?>
        </select>
        
        <button type="submit">Submit</button>
    </form>
</body>
</html>

<?php
// Zatvaranje konekcije
$conn->close();
?>
