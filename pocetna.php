<?php
require 'dbconn.php';
include 'menu.php'; 
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Početna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if (isset($_SESSION['message'])): ?>
        <div class="message">
            <?php 
            echo htmlspecialchars($_SESSION['message']); 
            unset($_SESSION['message']); 
            ?>
        </div>
    <?php endif; ?>

    <header>
        <h1>Dobrodošli u Auto Servis</h1>
        <p>Vaš pouzdan partner za održavanje i popravak automobila</p>
    </header>
    <section>
        <h2>Naše usluge</h2>
        <p>Pružamo kvalitetne usluge održavanja i popravka svih tipova vozila.</p>
    </section>
   
    <?php include 'samovijesti.php'; ?>
    <footer>
        <p>Auto Servis &copy; 2025 Enis Iseini</p>
    </footer>
</body>
</html>
