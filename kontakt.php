<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ime = htmlspecialchars($_POST['ime']);
    $prezime = htmlspecialchars($_POST['prezime']);
    $email = htmlspecialchars($_POST['email']);
    $country = htmlspecialchars($_POST['country']);
    $subject = htmlspecialchars($_POST['subject']);

    $to = "enis.i.gv@gmail.com"; 
    $subjectEmail = "Kontakt forma - Auto Servis";
    $message = "Ime: $ime\nPrezime: $prezime\nEmail: $email\nDržava: $country\nPoruka:\n$subject";
    $headers = "From: $email";

    if (mail($to, $subjectEmail, $message, $headers)) {
        $status = "Poruka uspješno poslana.";
    } else {
        $status = "Došlo je do pogreške prilikom slanja poruke.";
    }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'menu.php'; ?>
    <header>
        <h1>Kontakt Forma</h1>
    </header>
    <section>
        <?php if (isset($status)): ?>
            <p class="message"><?php echo $status; ?></p>
        <?php endif; ?>
        <form method="post">
            <label for="ime">First Name *</label>
            <input type="text" name="ime" placeholder="Your name.." required>
            <label for="prezime">Last Name *</label>
            <input type="text" name="prezime" placeholder="Your last name.." required>
            <label for="email">Your E-mail *</label>
            <input type="email" name="email" placeholder="Your e-mail.." required>
            <label for="country">Country:</label>
            <select name="country">
                <option value="Croatia">Croatia</option>
                <option value="Serbia">Serbia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
            </select>
            <label for="subject">Subject:</label>
            <textarea name="subject" placeholder="Write something.." style="height:200px"></textarea>
            <button type="submit">Submit</button>
        </form>
    </section>
    <footer>
        <p>Auto Servis &copy; 2025 Enis Iseini</p>
    </footer>
</body>
</html>
