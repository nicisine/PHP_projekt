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
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($user = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            $_SESSION['role'] = $user['role']; // Dodano: Postavljanje role u sesiju
            $_SESSION['message'] = "Prijava uspješna!";
            header("Location: index.php");
            exit;
        } else {
            echo "Neispravna lozinka.";
        }
    } else {
        echo "Korisnik ne postoji.";
    }
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'menu.php'; ?>
    <form method="post">
        <label for="username">Korisničko ime:</label>
        <input type="text" name="username" required>
        <label for="password">Lozinka:</label>
        <input type="password" name="password" required>
        <button type="submit">Prijavi se</button>
    </form>
</body>
</html>
