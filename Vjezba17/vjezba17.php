<?php
// Povezivanje s bazom podataka
$host = "localhost";
$username = "root";
$password = "";
$database = "ntpws";

$conn = new mysqli($host, $username, $password, $database);

// Provjera povezivanja
if ($conn->connect_error) {
    die("Povezivanje s bazom podataka nije uspjelo: " . $conn->connect_error);
}

// SQL upit za dohvaćanje korisnika i njihovih država
$sql = "SELECT 
            users.id AS user_id,
            users.first_name,
            users.last_name,
            users.email,
            users.username,
            country.country_name AS country
        FROM 
            users
        INNER JOIN 
            country
        ON 
            users.country_id = country.id";

$result = $conn->query($sql);

// Provjera ima li rezultata
if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Country</th>
          </tr>";

    // Ispis rezultata
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['user_id'] . "</td>
                <td>" . $row['first_name'] . "</td>
                <td>" . $row['last_name'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['username'] . "</td>
                <td>" . $row['country'] . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Nema podataka za prikaz.";
}

// Zatvaranje veze s bazom podataka
$conn->close();
?>
