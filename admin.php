<?php
session_start();
require '../dbconn.php'; 
if (!isset($_SESSION['user']) || $_SESSION['role'] != 1) {
    $_SESSION['message'] = "Nemate pristup admin sučelju.";
    header("Location: ../index.php");
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
       
        $id = $_POST['id'];
        $query = "DELETE FROM users WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
    } elseif (isset($_POST['edit'])) {
       
        $id = $_POST['id'];
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $role = $_POST['role'];
        $drzava_id = $_POST['drzava_id'];

        $query = "UPDATE users SET ime = ?, prezime = ?, email = ?, username = ?, role = ?, drzava_id = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'ssssiis', $ime, $prezime, $email, $username, $role, $drzava_id, $id);
        mysqli_stmt_execute($stmt);
    } elseif (isset($_POST['add'])) {
        
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role = $_POST['role'];
        $drzava_id = $_POST['drzava_id'];

        $query = "INSERT INTO users (ime, prezime, email, username, password, role, drzava_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'sssssii', $ime, $prezime, $email, $username, $password, $role, $drzava_id);
        mysqli_stmt_execute($stmt);
    } elseif (isset($_POST['add_drzava'])) {
        
        $naziv = $_POST['naziv'];
        $query = "INSERT INTO drzave (naziv) VALUES (?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 's', $naziv);
        mysqli_stmt_execute($stmt);
    }
}


$usersQuery = "SELECT users.*, drzave.naziv AS drzava FROM users LEFT JOIN drzave ON users.drzava_id = drzave.id";
$usersResult = mysqli_query($conn, $usersQuery);


$drzaveQuery = "SELECT * FROM drzave";
$drzaveResult = mysqli_query($conn, $drzaveQuery);
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin sučelje</title>
    <link rel="stylesheet" href="../style.css"> <!-- Putanja prema CSS datoteci -->
</head>
<body>
    <?php include '../menu.php'; ?> <!-- Putanja prema navigaciji -->
    <h1>Admin Panel</h1>
    <section>
        <h2>Upravljanje korisnicima</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Email</th>
                    <th>Korisničko ime</th>
                    <th>Uloga</th>
                    <th>Država</th>
                    <th>Akcije</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = mysqli_fetch_assoc($usersResult)): ?>
                    <tr>
                        <form method="post">
                            <td><?php echo $user['id']; ?></td>
                            <td><input type="text" name="ime" value="<?php echo htmlspecialchars($user['ime']); ?>"></td>
                            <td><input type="text" name="prezime" value="<?php echo htmlspecialchars($user['prezime']); ?>"></td>
                            <td><input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>"></td>
                            <td><input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>"></td>
                            <td>
                                <select name="role">
                                    <option value="1" <?php echo $user['role'] == 1 ? 'selected' : ''; ?>>Admin</option>
                                    <option value="2" <?php echo $user['role'] == 2 ? 'selected' : ''; ?>>User</option>
                                    <option value="3" <?php echo $user['role'] == 3 ? 'selected' : ''; ?>>Moderator</option>
                                </select>
                            </td>
                            <td>
                                <select name="drzava_id">
                                    <?php
                                    mysqli_data_seek($drzaveResult, 0); // Resetiraj pokazivač za ponovnu iteraciju
                                    while ($drzava = mysqli_fetch_assoc($drzaveResult)): ?>
                                        <option value="<?php echo $drzava['id']; ?>" <?php echo $user['drzava_id'] == $drzava['id'] ? 'selected' : ''; ?>>
                                            <?php echo htmlspecialchars($drzava['naziv']); ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </td>
                            <td>
                                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                <button type="submit" name="edit">Uredi</button>
                                <button type="submit" name="delete" onclick="return confirm('Jeste li sigurni da želite obrisati korisnika?')">Obriši</button>
                            </td>
                        </form>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </section>
    <section>
        <h2>Dodavanje korisnika</h2>
        <form method="post">
            <label for="ime">Ime:</label>
            <input type="text" name="ime" required>
            <label for="prezime">Prezime:</label>
            <input type="text" name="prezime" required>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="username">Korisničko ime:</label>
            <input type="text" name="username" required>
            <label for="password">Lozinka:</label>
            <input type="password" name="password" required>
            <label for="drzava_id">Država:</label>
            <select name="drzava_id" required>
                <option value="" disabled selected>Odaberite državu</option>
                <?php
                mysqli_data_seek($drzaveResult, 0);
                while ($drzava = mysqli_fetch_assoc($drzaveResult)): ?>
                    <option value="<?php echo $drzava['id']; ?>"><?php echo htmlspecialchars($drzava['naziv']); ?></option>
                <?php endwhile; ?>
            </select>
            <label for="role">Uloga:</label>
            <select name="role">
                <option value="1">Admin</option>
                <option value="2">User</option>
                <option value="3">Moderator</option>
            </select>
            <button type="submit" name="add">Dodaj korisnika</button>
        </form>
    </section>
    
</body>
</html>
