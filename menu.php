<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


$isLoggedIn = isset($_SESSION['user']);
?>

<nav>
    <ul>
        <li>
            <form action="/myu/index.php" method="get" style="display:inline;">
                <button type="submit" class="nav-button">Početna</button>
            </form>
        </li>
        <?php if (!$isLoggedIn): ?>
            <li>
                <form action="/myu/registracija.php" method="get" style="display:inline;">
                    <button type="submit" class="nav-button">Registracija</button>
                </form>
            </li>
            <li>
                <form action="/myu/login.php" method="get" style="display:inline;">
                    <button type="submit" class="nav-button">Prijava</button>
                </form>
            </li>
        <?php else: ?>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1): ?>
                <li>
                    <form action="/myu/admin/admin.php" method="get" style="display:inline;">
                        <button type="submit" class="nav-button">Admin Panel</button>
                    </form>
                </li>
                <li>
                    <form action="/myu/admin/uredvijesti.php" method="get" style="display:inline;">
                        <button type="submit" class="nav-button">Uređivanje vijesti</button>
                    </form>
                </li>
            <?php endif; ?>
            <li>
                <form action="/myu/logout.php" method="post" style="display:inline;">
                    <button type="submit" class="nav-button">Odjava</button>
                </form>
            </li>
        <?php endif; ?>
        <li>
            <form action="/myu/vijesti.php" method="get" style="display:inline;">
                <button type="submit" class="nav-button">Vijesti</button>
            </form>
        </li>
        <li>
            <form action="/myu/kontakt.php" method="get" style="display:inline;">
                <button type="submit" class="nav-button">Kontakt</button>
            </form>
        </li>
    </ul>
    <?php if ($isLoggedIn): ?>
        <div class="welcome-message">
            Dobrodošao, <strong><?php echo htmlspecialchars($_SESSION['user']); ?></strong>!
        </div>
    <?php endif; ?>
</nav>
