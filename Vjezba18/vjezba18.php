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

// Ažuriranje podataka korisnika
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $country_id = $_POST['country'];

    // SQL upit za ažuriranje korisnika
    $sql = "UPDATE users SET first_name = ?, last_name = ?, country_id = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $first_name, $last_name, $country_id, $user_id);

    if ($stmt->execute()) {
        echo "Podaci korisnika su ažurirani!";
    } else {
        echo "Greška prilikom ažuriranja podataka: " . $stmt->error;
    }

    $stmt->close();
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
            <th>Action</th>
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
                <td>
                    <a href='?edit=" . $row['user_id'] . "'>Edit</a>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Nema podataka za prikaz.";
}

// Obrada uređivanja korisnika
if (isset($_GET['edit'])) {
    $edit_user_id = $_GET['edit'];
    $edit_sql = "SELECT users.id, users.first_name, users.last_name, users.country_id 
                 FROM users WHERE id = ?";
    $stmt = $conn->prepare($edit_sql);
    $stmt->bind_param("i", $edit_user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        $first_name = $user['first_name'];
        $last_name = $user['last_name'];
        $country_id = $user['country_id'];
        
        // Prikazivanje forme za uređivanje
        echo "<h3>Edit User</h3>";
        echo "<form method='POST'>
                <input type='hidden' name='user_id' value='" . $edit_user_id . "'>
                <label for='first_name'>First Name:</label>
                <input type='text' name='first_name' value='" . $first_name . "' required><br>

                <label for='last_name'>Last Name:</label>
                <input type='text' name='last_name' value='" . $last_name . "' required><br>

                <label for='country'>Country:</label>
                <select name='country' required>";

        // Dohvat svih država za dropdown
        $country_result = $conn->query("SELECT id, country_name FROM country");
        while ($country = $country_result->fetch_assoc()) {
            $selected = ($country['id'] == $country_id) ? 'selected' : '';
            echo "<option value='" . $country['id'] . "' $selected>" . $country['country_name'] . "</option>";
        }

        echo "</select><br>

                <button type='submit' name='update'>Update</button>
              </form>";
    } else {
        echo "Korisnik nije pronađen.";
    }

    $stmt->close();
}

// Zatvaranje veze s bazom podataka
$conn->close();
?>
