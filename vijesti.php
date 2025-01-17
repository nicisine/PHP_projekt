<?php
require 'dbconn.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'menu.php'; 
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vijesti</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Vijesti</h1>
    </header>
    <section>
        <h2>Novosti</h2>
        <?php
        
        $newsQuery = "SELECT * FROM news ORDER BY date DESC";
        $result = mysqli_query($conn, $newsQuery);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($news = mysqli_fetch_assoc($result)) {
                echo "<article class='news-article'>";
                if (!empty($news['image'])) {
                    echo "<img src='" . htmlspecialchars($news['image']) . "' alt='Slika vijesti' class='news-image'>";
                }
                echo "<h3>" . htmlspecialchars($news['title']) . "</h3>";
                echo "<p>" . htmlspecialchars($news['content']) . "</p>";
                echo "</article>";
            }
        } else {
            echo "<p>Trenutno nema dostupnih vijesti.</p>";
        }
        ?>
    </section>
    <footer>
        <p>Auto Servis &copy; 2025 Enis Iseini</p>
    </footer>
</body>
</html>
