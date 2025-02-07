<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pretraživač Korisnika</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f9;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            width: 300px;
        }
        button {
            padding: 10px 15px;
            font-size: 16px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .results {
            margin-top: 20px;
        }
        .results p {
            background: #fff;
            padding: 10px;
            border: 1px solid #ddd;
            margin: 5px 0;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Pretraživač Korisnika</h1>
    <form method="POST" action="">
        <label for="search">Unesite ime ili prezime:</label><br>
        <input type="text" id="search" name="search" required>
        <button type="submit">Pretraži</button>
    </form>

    <div class="results">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $search = trim($_POST['search']);

            // Povezivanje na bazu
            $con = mysqli_connect("localhost", "root", "", "ntpws");

            if (!$con) {
                die("Povezivanje na bazu nije uspjelo: " . mysqli_connect_error());
            }

            // Priprema upita
            $query = "SELECT first_name, last_name FROM users WHERE first_name LIKE ? OR last_name LIKE ?";
            $stmt = mysqli_prepare($con, $query);
            $param = "%" . $search . "%";
            mysqli_stmt_bind_param($stmt, "ss", $param, $param);

            // Izvršavanje upita
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<p>" . htmlspecialchars($row['first_name']) . " " . htmlspecialchars($row['last_name']) . "</p>";
                }
            } else {
                echo "<p>Nema rezultata za vaš upit.</p>";
            }

            // Zatvaranje konekcije
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }
        ?>
    </div>
</body>
</html>