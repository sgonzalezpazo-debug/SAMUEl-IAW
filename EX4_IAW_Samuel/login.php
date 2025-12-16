<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    if ($usuario === "admin" && $clave === "P4ssw0rd") {
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<form method="post">
    <label>Usuario:</label>
    <input type="text" name="usuario"><br>
    <label>Contraseña:</label>
    <input type="password" name="clave"><br>
    <input type="submit" value="Identificar">
    <input type="reset" value="Borrar">
</form>

