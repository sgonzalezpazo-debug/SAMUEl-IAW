<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['confirmar']) && $_POST['confirmar'] === "Sí") {
        session_destroy();
        header("Location: login.php");
        exit();
    } else {
        header("Location: index.php");
        exit();
    }
}
?>

<form method="post">
    <p>¿Seguro que quiere desconectarse?</p>
    <input type="submit" name="confirmar" value="Sí">
    <input type="submit" name="confirmar" value="No">
</form>

