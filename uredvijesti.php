<?php
session_start();
require '../dbconn.php';

// Provjera je li korisnik prijavljen i ima li administratorske ovlasti
if (!isset($_SESSION['user']) || $_SESSION['role'] != 1) {
    $_SESSION['message'] = "Nemate pristup ovoj stranici.";
    header("Location: ../index.php");
    exit;
}

// Funkcionalnosti za dodavanje, uređivanje i brisanje vijesti
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        // Brisanje vijesti
        $id = $_POST['id'];
        $query = "DELETE FROM news WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
    } elseif (isset($_POST['edit'])) {
        // Uređivanje vijesti
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $imagePath = '';

        // Provjera je li slika uploadana
        if (!empty($_FILES['image']['name'])) {
            $imageName = basename($_FILES['image']['name']);
            $targetDir = "../slikevijesti/";
            $targetFile = $targetDir . $imageName;

            // Pomicanje slike na ciljnu lokaciju
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $imagePath = "slikevijesti/" . $imageName;
            }
        }

        // Ažuriranje vijesti s novim podacima
        $query = "UPDATE news SET title = ?, content = ?, image = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'sssi', $title, $content, $imagePath, $id);
        mysqli_stmt_execute($stmt);
    } elseif (isset($_POST['add'])) {
        // Dodavanje vijesti
        $title = $_POST['title'];
        $content = $_POST['content'];
        $imagePath = '';

        // Provjera je li slika uploadana
        if (!empty($_FILES['image']['name'])) {
            $imageName = basename($_FILES['image']['name']);
            $targetDir = "../slikevijesti/";
            $targetFile = $targetDir . $imageName;

            // Pomicanje slike na ciljnu lokaciju
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $imagePath = "slikevijesti/" . $imageName;
            }
        }

        $query = "INSERT INTO news (title, content, image, date) VALUES (?, ?, ?, NOW())";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'sss', $title, $content, $imagePath);
        mysqli_stmt_execute($stmt);
    }
}

// Dohvaćanje svih vijesti iz baze
$newsQuery = "SELECT * FROM news ORDER BY date DESC";
$newsResult = mysqli_query($conn, $newsQuery);
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uređivanje vijesti</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include '../menu.php'; ?>
    <h1>Uređivanje vijesti</h1>
    <section>
        <h2>Popis vijesti</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naslov</th>
                    <th>Sadržaj</th>
                    <th>Slika</th>
                    <th>Datum</th>
                    <th>Akcije</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($news = mysqli_fetch_assoc($newsResult)): ?>
                    <tr>
                        <form method="post" enctype="multipart/form-data">
                            <td><?php echo $news['id']; ?></td>
                            <td><input type="text" name="title" value="<?php echo htmlspecialchars($news['title']); ?>"></td>
                            <td><textarea name="content"><?php echo htmlspecialchars($news['content']); ?></textarea></td>
                            <td>
                                <?php if ($news['image']): ?>
                                    <img src="../<?php echo $news['image']; ?>" alt="Slika vijesti" style="width:100px;">
                                <?php endif; ?>
                                <input type="file" name="image">
                            </td>
                            <td><?php echo $news['date']; ?></td>
                            <td>
                                <input type="hidden" name="id" value="<?php echo $news['id']; ?>">
                                <button type="submit" name="edit">Uredi</button>
                                <button type="submit" name="delete" onclick="return confirm('Jeste li sigurni da želite obrisati ovu vijest?')">Obriši</button>
                            </td>
                        </form>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </section>
    <section>
        <h2>Dodavanje nove vijesti</h2>
        <form method="post" enctype="multipart/form-data">
            <label for="title">Naslov:</label>
            <input type="text" name="title" required>
            <label for="content">Sadržaj:</label>
            <textarea name="content" required></textarea>
            <label for="image">Slika:</label>
            <input type="file" name="image">
            <button type="submit" name="add">Dodaj vijest</button>
        </form>
    </section>
</body>
</html>
