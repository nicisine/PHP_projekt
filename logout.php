<?php

session_start();


if (isset($_SESSION['user'])) {
    unset($_SESSION['user']); 
    unset($_SESSION['role']); 
    $_SESSION['message'] = "Uspješno ste se odjavili."; 
}


header("Location: index.php"); 
exit;
?>
