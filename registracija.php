<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

require 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $drzava_id = $_POST['drzava']; 

    
    if (empty($drzava_id)) {
        echo "Molimo odaberite državu.";
    } else {
        
        $query = "INSERT INTO users (ime, prezime, email, username, password, drzava_id) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'sssssi', $ime, $prezime, $email, $username, $password, $drzava_id);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['message'] = "Registracija uspješna! Sada se možete prijaviti.";
            header("Location: login.php");
            exit;
        } else {
            echo "Greška pri registraciji: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'menu.php'; ?>
    <form method="post">
        <h2>Registration Form</h2>
        <label for="ime">First Name *</label>
        <input type="text" name="ime" placeholder="Your name.." required>

        <label for="prezime">Last Name *</label>
        <input type="text" name="prezime" placeholder="Your last name.." required>

        <label for="email">Your E-mail *</label>
        <input type="email" name="email" placeholder="Your e-mail.." required>

        <label for="username">Username:* <span class="hint">(Username must have min 5 and max 10 char)</span></label>
        <input type="text" name="username" placeholder="Username.." minlength="5" maxlength="10" required>

        <label for="password">Password:* <span class="hint">(Password must have min 4 char)</span></label>
        <input type="password" name="password" placeholder="Password.." minlength="4" required>

        <label for="drzava">Country:</label>
        <select name="drzava" required>
            <option value="">molimo odaberite</option>
            <?php
            
            $countriesQuery = "SELECT * FROM drzave";
            $countriesResult = mysqli_query($conn, $countriesQuery);

            while ($country = mysqli_fetch_assoc($countriesResult)) {
                echo "<option value='" . $country['id'] . "'>" . htmlspecialchars($country['naziv']) . "</option>";
            }
            ?>
        </select>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
