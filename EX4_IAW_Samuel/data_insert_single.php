<?php
$servername = "localhost";
$username = "sgp";
$password = "sgp";
$dbname = "bd_w3_sgp";


include "autenticacion.php";
include "recoge.php";

// Recoger datos del formulario
$firstname = recoge('firstname');
$lastname = recoge('lastname');
$email = recoge('email');
$codigo = recoge('codigo_usuario');

// Validar que no estén vacíos
if (!$firstname || !$lastname || !$email || !$codigo) {
    die("Todos los campos son obligatorios.");
}

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";

// Insertar datos con prepared statement
$stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email, codigo_usuario) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $firstname, $lastname, $email, $codigo);

if ($stmt->execute()) {
    echo "Nuevo registro creado correctamente.";
} else {
    echo "Error al insertar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>


